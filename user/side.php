<?php
include "../db_connection.php";
session_start();
if (isset($_SESSION["user_id"])) {
} else {
    header("Location: login.php");
    exit;
}

// admin details
$id = $_SESSION["user_id"];
$query = "SELECT * FROM users WHERE  user_id = '$id'";
$result = mysqli_query($conn, $query);
$details = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/component/image/apple(1).png" type="image/x-icon">
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

        #sidebar .logo p {
            color: #fff;
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
                <img src="<?php echo $details['img']; ?>" alt="Current Image">
                <p><?php echo $details['first_name'].' '.$details['last_name'] ?></p>
        </div>
        <ul>
            <li onclick="navigateTo('dashboard.php')">
                <a id="dashboard-option">
                    <img src="../admin/img/comonent/dashboard.png" alt="Dashboard Icon">Profile
                </a>
            </li>
            <li onclick="navigateTo('myorders.php')">
                <a id="dashboard-option">
                    <img src="../admin/img/comonent/orders.png" alt="Orders Icon">Orders
                </a>
            </li>
            <li onclick="navigateTo('../logout.php')">
                <a id="user-details-option">
                    <img src="../admin/img/comonent/logout.png" alt="Log Out">Log Out
                </a>
            </li>
        </ul>

    </div>

</body>

</html>