<?php
session_start();

include 'db_connection.php';

if (isset($_POST['delete'])) {
    $cart_id = $_POST['cart_id'];
    $delete_cart_item = $conn->prepare("DELETE FROM cart WHERE id = ?");
    $delete_cart_item->bind_param("i", $cart_id);
    $delete_cart_item->execute();
}

if (isset($_POST['update_qty'])) {
    $cart_id = $_POST['cart_id'];
    $qty = $_POST['qty'];
    $update_qty = $conn->prepare("UPDATE cart SET quantity = ? WHERE id = ?");
    $update_qty->bind_param("ii", $qty, $cart_id);
    $update_qty->execute();
    $message[] = 'Cart quantity updated';
}
if (isset($_POST['checkout'])) {
    // Get the customer_id from the session
    $customer_id = $_SESSION['user_id'];

    // Insert the order with the customer_id and current date
    $insert_query = "INSERT INTO orders (customer_id, order_date, order_status) VALUES ('$customer_id', NOW(), 'Pending')";
    $result = mysqli_query($conn, $insert_query);

    if ($result) {
        // Get the order_id of the newly inserted order
        $last_order_id_query = "SELECT LAST_INSERT_ID() AS new_order_id";
        $result_last_id = mysqli_query($conn, $last_order_id_query);
        if ($result_last_id) {
            if (mysqli_num_rows($result_last_id) > 0) {
                $row = mysqli_fetch_assoc($result_last_id);
                $new_order_id = $row['new_order_id'];

                // Insert order items for products with IDs in the "order_items" table
                $cart_query = "SELECT * FROM cart WHERE user_id = $customer_id";
                $cart_result = mysqli_query($conn, $cart_query);
                if ($cart_result) {
                    while ($cart_row = mysqli_fetch_assoc($cart_result)) {
                        $product_id = $cart_row['pid'];
                        $quantity = $cart_row['quantity'];

                        $order_items_query = "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('$new_order_id', '$product_id', '$quantity')";
                        if (!mysqli_query($conn, $order_items_query)) {
                            echo "Error: " . mysqli_error($conn);
                        }
                    }
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                // Handle the case when the last inserted ID is not found
                echo "No new order ID found.";
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Remove all items from the cart for the specific user
    $delete_query = "DELETE FROM cart WHERE user_id = '$customer_id'";
    mysqli_query($conn, $delete_query);

    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        .products_shopping-cart {
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            margin: 80px 0;
        }

        .box-container {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: normal;
        }

        td {
            font-weight: 500;
        }


        .product-name {
            display: flex;
            align-items: center;
        }

        .product-img {
            height: 90px;
            width: 65px;
        }


        .qty-form {
            display: flex;
            align-items: center;
        }

        .qty {
            width: 80px;
            padding: 5px;
            margin-right: 5px;
        }

        button[type="submit"] {
            padding: 5px 10px;
            background-color: none;
            color: white;
            border: none;
            cursor: pointer;
            margin-right: 5px;
        }

        .delete-btn {
            padding: 5px 10px;
            background: url('img/component/close.png');
            border: none;
            background-size: cover;
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        .empty {
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
        }

        .cart-option {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .option-btn,
        .checkout-btn {
            padding: 10px 20px;
            background-color: #333;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 40px;
        }

        .option-btn,
        .checkout-btn:hover {
            background-color: #555;
        }

        .disabled {
            pointer-events: none;
            opacity: 0.5;
        }

        .update-btn-image {
            width: 20px;
            height: 20px;
            cursor: pointer;
            border: none;
            background: none;
            padding: 0;
        }
    </style>
</head>

<body>

    <?php include 'header.php'; ?>

    <section class="products_shopping-cart">
        <h3 class="heading">Shopping Cart</h3>
        <div class="box-container">
            <table>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
                <?php
                $grand_total = 0;
                $result = mysqli_query($conn, $sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $query_product = "SELECT * FROM products WHERE product_id = '{$row['pid']}'";
                        $result_product = mysqli_query($conn, $query_product);
                        $product = mysqli_fetch_assoc($result_product);
                        $sub_total = $row['price'] * $row['quantity'];
                        $grand_total += $sub_total;
                ?>
                        <tr>
                            <td>
                                <a href="quick_view.php?pid=<?= $row['pid']; ?>">
                                    <img class="product-img" src="img/<?= $product['img']; ?>" alt="">
                                </a>
                            </td>
                            <td>
                                <div class="product-name"><?= $row['name']; ?></div>
                            </td>
                            <td>
                                <form action="" method="post" class="qty-form">
                                    <input type="hidden" name="cart_id" value="<?= $row['id']; ?>">
                                    <input type="number" name="qty" class="qty" min="1" max="99" value="<?= $row['quantity']; ?>">
                                    <button type="submit" name="update_qty">
                                        <img src="img/component/reload.png" alt="no image" class="update-btn-image">
                                    </button>

                                    <input type="submit" onclick="return confirm('Do you want to remove this product from cart?');" class="delete-btn" name="delete">
                                </form>
                            </td>
                            <td>$<?= $row['price']; ?></td>
                            <td>$<?= $sub_total; ?></td>
                        </tr>
                <?php
                    }
                } else {
                    echo '<tr><td colspan="5"><p class="empty">Your cart is empty</p></td></tr>';
                }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Grand Total:</td>
                    <td>
                        <p><span>$<?= $grand_total; ?>/-</span></p>
                    </td>
                </tr>
            </table>
        </div>
        <hr>
        <div class="cart-option">
            <a href="shop.php" class="option-btn">Continue Shopping</a>
            <form action="" method="post">
                <input type="hidden" name="cart_id" value="<?= $row['id']; ?>">
                <input type="submit" value="Proceed to Checkout" onclick="return confirm('Do you want to checkout now?');" class="checkout-btn<?= ($grand_total > 1) ? '' : 'disabled'; ?>" name="checkout">
            </form>
        </div>
    </section>



    <?php
    if (isset($_POST['add_to_cart'])) {

        if ($_SESSION['user_id'] == '') {
            header('location:user_login.php');
        } else {

            $pid = $_POST['pid'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];

            $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
            $check_cart_numbers->execute([$name, $_SESSION['user_id']]);
            $result = $check_cart_numbers->get_result();

            if ($result->num_rows > 0) {
                $message[] = 'Already added to cart!';
            } else {

                $insert_cart = $conn->prepare("INSERT INTO `cart` (user_id, pid, name, price, quantity) VALUES (?, ?, ?, ?, ?)");
                $insert_cart->execute([$_SESSION['user_id'], $pid, $name, $price, $qty]);
                $message[] = 'Added to cart!';
            }
        }
    }

    include 'footer.php';
    ?>

</body>

</html>