<?php
session_start();

include 'db_connection.php';

if (isset($_POST['delete'])) {
    $cart_id = $_POST['cart_id'];
    $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
    $delete_cart_item->execute([$cart_id]);
}

if (isset($_GET['delete_all'])) {
    $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
    $delete_cart_item->execute([$_SESSION['user_id']]);
    header('location:cart.php');
}

if (isset($_POST['update_qty'])) {
    $cart_id = $_POST['cart_id'];
    $qty = $_POST['qty'];
    $update_qty = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE id = ?");
    $update_qty->execute([$qty, $cart_id]);
    $message[] = 'cart quantity updated';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>

<body>

    <?php include 'header.php'; ?>

    <section class="products shopping-cart">

        <h3 class="heading">Shopping Cart</h3>

        <div class="box-container">

            <?php
            $grand_total = 0;
            $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $select_cart->execute([$_SESSION['user_id']]);
            $result = $select_cart->get_result();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <form action="" method="post" class="box">
                        <input type="hidden" name="cart_id" value="<?= $row['id']; ?>">
                        <a href="quick_view.php?pid=<?= $row['pid']; ?>"></a>
                        <img src="uploaded_img/<?= $row['image']; ?>" alt="">
                        <div class="name"><?= $row['name']; ?></div>
                        <div class="flex">
                            <div class="price">$<?= $row['price']; ?>/-</div>
                            <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="<?= $row['quantity']; ?>">
                            <button type="submit" name="update_qty">Update</button>
                        </div>
                        <div class="sub-total"> sub total : <span>$<?= $sub_total = ($row['price'] * $row['quantity']); ?>/-</span> </div>
                        <input type="submit" value="Delete" onclick="return confirm('Delete this from cart?');" class="delete-btn" name="delete">
                    </form>
            <?php
                    $grand_total += $sub_total;
                }
            } else {
                echo '<p class="empty">Your cart is empty</p>';
            }
            ?>
        </div>

        <div class="cart-total">
            <p>Grand total: <span>$<?= $grand_total; ?>/-</span></p>
            <a href="shop.php" class="option-btn">Continue Shopping</a>
            <a href="cart.php?delete_all" class="delete-btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>" onclick="return confirm('Delete all from cart?');">Delete All Items</a>
            <a href="checkout.php" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>">Proceed to Checkout</a>
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