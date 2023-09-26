<?php
include "../db_connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../component/image/apple(1).png" type="image/x-icon">
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
        #sidebar ul{
            padding: 0;
        }

        #sidebar ul li{
            list-style-type: none;
            padding: 10px 20px;
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

        #user-profile {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            align-items: center;
        }

        #user-profile img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }

        #user-profile a {
            color: #fff;
            text-decoration: none;
        }

        #content {
            margin-left: 250px;
            padding: 20px;
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
            <li><a href="#" id="inventory-option">Inventory</a></li>
            <li><a href="user_details.php" id="user-details-option">User Details</a></li>
        </ul>

    </div>
    <div id="user-profile">
        <a href="user_profile_settings.html">
            <img src="../component/image/admin-img.jpg" alt="User Profile">
        </a>
    </div>
    <div id="content">
        <!-- Content of the selected option will go here -->
        <h1>Welcome to the Dashboard</h1>
    </div>
</body>

</html>