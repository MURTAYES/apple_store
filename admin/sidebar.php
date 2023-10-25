<?php
include "../db_connection.php";
session_start();
if (isset($_SESSION["admin_id"])) {
} else {
    header("Location: login.php");
    exit;
}

// admin details
$id = $_SESSION["admin_id"];
$query = "SELECT * FROM admins WHERE  admin_id = '$id'";
$result = mysqli_query($conn, $query);
$details = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/component/image/apple(1).png" type="image/x-icon">
    <title>Admin Dashboard</title>
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
            list-style-type: none;
            padding: 0;
        }

        #sidebar li {
            padding: 10px;
            display: flex;
            align-items: center;
        }

        #sidebar ul li img {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        #sidebar ul li a {
            text-decoration: none;
            color: #fff;
            padding: 10px 20px;
            cursor: pointer;
        }

        #sidebar ul li a:hover {
            background: #444;
            color: #fff;
        }

        .logout-btn {
            top: 10px;
            right: 10px;
        }

        .logout-btn {
            background-color: #333;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            display: flex;
            align-items: center;
        }

        .logout-btn img {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        #user-profile {
            position: fixed;
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
    </style>
    <script>
        function navigateTo(url) {
            window.location.href = url;
        }
    </script>
</head>

<body>
    <div id="sidebar">
        <div class="logo">
            <a href="admindashboard.php"><img src="../img/component/apple.png" alt="Logo"></a>
        </div>
        <ul>
            <li onclick="navigateTo('admindashboard.php')">
                <a id="dashboard-option">
                    <img src="img/comonent/dashboard.png" alt="Dashboard Icon">Dashboard
                </a>
            </li>
            <li onclick="navigateTo('orders.php')">
                <a id="dashboard-option">
                    <img src="img/comonent/orders.png" alt="Orders Icon">Orders
                </a>
            </li>
            <li onclick="navigateTo('inventory.php')">
                <a id="inventory-option">
                    <img src="img/comonent/inventory.png" alt="Inventory Icon">Inventory
                </a>
            </li>
            <li onclick="navigateTo('users.php')">
                <a id="user-details-option">
                    <img src="img/comonent/customer.png" alt="User Details Icon">User Details
                </a>
            </li>
            <li onclick="navigateTo('../logout.php')">
                <a id="user-details-option">
                    <img src="img/comonent/logout.png" alt="Log Out">Log Out
                </a>
            </li>
        </ul>

    </div>
    <div id="user-profile">
        <a href="profile.php">
            <img src="<?php echo $details['img']; ?>" alt="Current Image">
            <p><?php echo $details['username'] ?></p>
        </a>
    </div>
</body>

</html>