<?php
include "../db_connection.php";
session_start();
// Check if the admin is logged in and if the admin ID is set in the session
if (isset($_SESSION["admin_id"])) {
} else {
    // Redirect or display an error if the admin is not logged in
    header("Location: login.php"); // Redirect to the login page, for example
    exit;
}
$id = $_GET['pid'];
$query = "SELECT * FROM products WHERE  product_id = '$pid'";
$result = mysqli_query($conn, $query);

$productData = mysqli_fetch_assoc($result);

// Now you can access all the product fields
$productId = $productData['product_id'];
$productName = $productData['name'];
$productDescription = $productData['description'];
$productPrice = $productData['price'];
$productQuantity = $productData['quantity'];
$productImage = $productData['image'];
$categoryId = $productData['category_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../component/image/apple(1).png" type="image/x-icon">
    <title>Profile</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
        }

        #sidebar {
            position: fixed;
            width: 200px;
            height: 100%;
            background: #333;
            padding-top: 20px;
            color: #fff;
        }

        #sidebar .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        #sidebar .logo img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }

        #sidebar ul {
            padding: 0;
        }

        #sidebar ul li {
            list-style-type: none;
            padding: 10px 10px;
        }

        #sidebar ul li a {
            text-decoration: none;
            color: #fff;
            padding: 10px 20px;
            cursor: pointer;
        }

        #sidebar ul li a:hover {
            background: #444;
            color: #000;
        }

        #log-out {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            align-items: center;
        }

        .logout .btn {
            width: 80px;
            padding: 8px 10px;
            font-size: 15px;
            border: 0;
            background-color: #333;
            color: #fff;
            border-radius: 3px;
            cursor: pointer;
            text-align: center;
        }

        .logout .btn:hover {
            background-color: #555;
        }

        #user-profile {
            position: absolute;
            bottom: 20px;
            left: 20px;
            display: flex;
            align-items: center;
        }

        #user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        #user-profile a {
            color: #fff;
            text-decoration: none;
            display: flex;
        }

        #user-profile a p {
            display: flex;
            align-items: center;
        }

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
    <div id="sidebar">
        <div class="logo">
            <img src="../component/image/apple.png" alt="Logo">
        </div>
        <ul>
            <li><a href="#" id="dashboard-option">Dashboard</a></li>
            <li><a href="inventory.php" id="inventory-option">Inventory</a></li>
            <li><a href="user_details.php" id="user-details-option">User Details</a></li>
        </ul>

    </div>
    <div id="user-profile">
        <a href="profile.php">
            <img src="img/m_admin.jpeg" alt="User Profile">
            <p>Murtayes</p>
        </a>
    </div>
    <div id="log-out">
        <a href="../logout.php">
            <div class="logout">
                <input type="submit" value="Log Out" name="log_in" class="btn">
            </div>
        </a>
    </div>
    <div class="content">
        <form action="#" method="post">
            <div class="title">
                <h2>User details</h2>
            </div>
            <!-- `product_id`, `name`, `description`, `price`, `quantity`, `image`, `category_id` -->
            <div class="form">
                <div class="input_field">
                    <label>Product_id</label>
                    <input type="text" value="<?php echo $productId; ?>" class="input" name="fname" required>
                </div>
                <div class="input_field">
                    <label>Name</label>
                    <input type="text" value="name" class="input" name="email" required>
                </div>
                <div class="input_field">
                    <label>Price</label>
                    <input type="text" value="price" class="input" name="phone" required>
                </div>
                <div class="input_field">
                    <label>Quantity</label>
                    <input type="text" value="quantity" class="input" name="conpass" required>
                </div>
                <div class="input_field">
                    <label>category_id</label>
                    <input type="text" value="category_id" class="input" name="conpass" required>
                </div>
                <div class="input_field">
                    <input type="submit" value="Update details" class="btn" name="sign_up">
                </div>
            </div>
        </form>
    </div>
</body>

</html>