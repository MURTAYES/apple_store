<?php
include('sidebar.php');

$pid = $_GET['pid'];
$query__roduct = "SELECT * FROM products WHERE  product_id = '$pid'";
$result_product = mysqli_query($conn, $query__roduct);
$product = mysqli_fetch_assoc($result_product);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        .content .form .input_field img {
            height: 90px;
            width: 65px;
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

        .custom_upload_button,
        button {
            background-color: #333;
            color: #fff;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            margin-left: 20px;
        }

        .delete .btn {
            width: 120px;
            padding: 8px 10px;
            font-size: 15px;
            border: 0;
            background-color: #333;
            color: #fff;
            border-radius: 3px;
            cursor: pointer;
            text-align: center;
            margin-left: 20px;
        }

        .delete .btn:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="title">
            <h1>Inventory Update</h1>
            <div class="delete">
                <a href="com/delete.php?pid=<?php echo $product['product_id']; ?>">
                    <button type="submit" name="delete" class="btn">Delete product</button>
                </a>
            </div>
        </div>
        <form action="#" method="post">
            <div class="form">
                <div class="input_field">
                    <img src="<?php echo $product['img']; ?>" alt="Current Image">
                </div>
                <div class="input_field">
                    <label>Product_id</label>
                    <input type="text" value="<?php echo $product['product_id']; ?>" class="input" name="pid" required>
                </div>
                <div class="input_field">
                    <label>Name</label>
                    <input type="text" value="<?php echo $product['name']; ?>" class="input" name="name" required>
                </div>
                <div class="input_field">
                    <label>Price</label>
                    <input type="text" value="<?php echo $product['price']; ?>" class="input" name="price" required>
                </div>
                <div class="input_field">
                    <label>Quantity</label>
                    <input type="text" value="<?php echo $product['quantity']; ?>" class="input" name="quan" required>
                </div>
                <div class="input_field">
                    <label>category_id</label>
                    <input type="text" value="<?php echo $product['category_id']; ?>" class="input" name="c_id" required>
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

            $sql = "UPDATE products SET name = '$name', price = '$price', quantity = '$quan', category_id = '$c_id' WHERE product_id = $pid";
            if (mysqli_query($conn, $sql)) {
                echo "Product details updated successfully.";
            } else {
                echo "Error updating product details: " . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
        ?>
    </div>
</body>

</html>