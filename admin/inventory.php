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
                <input type="submit" value="Log Out" name="log_out" class="btn">
            </div>
        </a>
    </div>
    <div id="content">
        <h1>Inventory details</h1>
        <table>
            <tr>
                <th>category_id</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>price</th>
                <th>quantity</th>
                <th>image</th>
                <th>Option</th>
            </tr>
            <?php
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td> $row[category_id]  </td>
                            <td> $row[product_id]   </td>
                            <td> $row[name]         </td>
                            <td> $row[price]        </td>
                            <td> $row[quantity]     </td>
                            <td> $row[image]        </td>
                            <td> <a href='inventupdate.php?pid={$row['product_id']}'>Edit</a> </td>
                         </tr>";
                }
            } else {
                echo "No users found in the database.";
            }

            $conn->close();
            ?>
        </table>

    </div>
</body>

</html>