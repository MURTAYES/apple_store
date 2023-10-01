<?php
include('sidebar.php');

$pid=$_GET['pid'];
$query__roduct = "SELECT * FROM products WHERE  product_id = '$pid'";
$result_product = mysqli_query($conn, $query__roduct);
$product = mysqli_fetch_assoc($result_product);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../component/image/apple(1).png" type="image/x-icon">
    <title>Profile</title>
    <style>

        .content {
            margin-left: 220px;
            padding: 20px;
        }

        .content .form {
            width: 80%;
        }

        .content .form .input_field {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .content .form .input_field label {
            width: 200px;
            margin-right: 10px;
            font-size: 15px;
        }

        .content .form .input_field .input {
            width: 100%;
            outline: none;
            border: 1px solid #333;
            font-size: 15px;
            padding: 8px 10px;
            border-radius: 3px;
        }

        .content .form .input_field textarea {
            width: 100%;
            outline: none;
            border: 1px solid #333;
            font-size: 15px;
            padding: 8px 10px;
            border-radius: 3px;
            height: 80px;
            resize: none;
        }

        .content .form .input_field select {
            width: 100%;
            position: relative;
            height: 40px;
            border: 1px solid #333;
            border-radius: 3px;
        }

        .content .form .input_field select {
            padding: 8px 10px;
        }

        .content .form .input_field a {
            color: #333;
            font-size: 15px;
            margin-top: 8px;
        }

        .content .form .input_field a:hover {
            color: #555;
        }

        .content .form .input_field .check {
            width: 18px;
            height: 18px;
            margin-top: 10px;
        }

        .content .form .input_field .btn {
            width: 100%;
            padding: 8px 10px;
            font-size: 15px;
            border: 0;
            background-color: #333;
            color: #fff;
            border-radius: 3px;
            cursor: pointer;
        }

        .content .form .input_field .btn:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <div class="content">
    <form action="#" method="post">
            <div class="title">
                <h2>User details</h2>
            </div>
            <!-- `product_id`, `name`, `description`, `price`, `quantity`, `image`, `category_id` -->
            <div class="form">
                <div class="input_field">
                    <label>Product_id</label>
                    <input type="text" value="<?php echo $product['product_id'];?>" class="input" name="pid" required>
                </div>
                <div class="input_field">
                    <label>Name</label>
                    <input type="text" value="<?php echo $product['name'];?>" class="input" name="name" required>
                </div>
                <div class="input_field">
                    <label>Price</label>
                    <input type="text" value="<?php echo $product['price'];?>" class="input" name="price" required>
                </div>
                <div class="input_field">
                    <label>Quantity</label>
                    <input type="text" value="<?php echo $product['quantity'];?>" class="input" name="quan" required>
                </div>
                <div class="input_field">
                    <label>category_id</label>
                    <input type="text" value="<?php echo $product['category_id'];?>" class="input" name="c_id" required>
                </div>
                <div class="input_field">
                    <input type="submit" value="Update details" class="btn" name="update">
                </div>
            </div>
        </form>
<?php

if (isset($_POST['update'])) {
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quan = $_POST['quan'];
    $c_id = $_POST['c_id'];

    // Perform validation if needed

    // Construct an SQL UPDATE query
    $sql = "UPDATE products SET name = '$name', price = '$price', quantity = '$quan', category_id = '$c_id' WHERE product_id = $pid";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Product details updated successfully.";
    } else {
        echo "Error updating product details: " . mysqli_error($conn);
    }

    // Close the database connection if needed
    mysqli_close($conn);
}
?>
    </div>
</body>

</html>
