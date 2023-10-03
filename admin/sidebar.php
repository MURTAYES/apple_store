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

        #content {
            margin-left: 220px;
            padding: 20px;
        }

        #content table {
            width: 80%;
            text-align: center;
            padding: 15px auto;
            border-collapse: collapse;
        }

        #content table th {
            background-color: #333;
            color: #fff;
            padding: 5px;
        }

        #content table tr {
            border-bottom: 1px solid #fff;
        }

        #content table td {
            background-color: #999;
            color: #fff;
            padding: 5px;
        }
    </style>
</head>

<body>
    <div id="sidebar">
        <div class="logo">
            <a href="admindashboard.php"><img src="../component/image/apple.png" alt="Logo"></a>
        </div>
        <ul>
            <li><a href="admindashboard.php" id="dashboard-option">Dashboard</a></li>
            <li><a href="inventory.php" id="inventory-option">Inventory</a></li>
            <li><a href="user_details.php" id="user-details-option">User Details</a></li>
        </ul>

    </div>
    <div id="user-profile">
        <a href="profile.php">
        <img src="<?php echo $details['img']; ?>"  alt="Current Image">
            <p><?php echo $details['username'] ?></p>
        </a>
    </div>
    <div id="log-out">
        <a href="../logout.php">
            <div class="logout">
                <input type="submit" value="Log Out" name="log_out" class="btn">
            </div>
        </a>
    </div>
    <div id="content">

    </div>
</body>

</html>