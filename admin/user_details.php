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

        #sidebar ul {
            padding: 0;
        }

        #sidebar ul li {
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
        }

        #content {
            margin-left: 220px;
            padding: 20px;
        }
        #content table{
            width: 80%;
            text-align: center;
            padding: 15px auto;
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
        <h1>User Information</h1>
        <table>
            <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <!-- Add more table headers for additional user details -->
            </tr>
            <?php
            // Retrieve User Data and populate the table
            $sql = "SELECT * FROM users"; // Customize the query as needed
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["user_id"] . "</td>";
                    echo "<td>" . $row["first_name"] . "</td>";
                    echo "<td>" . $row["last_name"] . "</td>";
                    echo "<td>" . $row["gender"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    // Add more table cells for additional user details
                    echo "</tr>";
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