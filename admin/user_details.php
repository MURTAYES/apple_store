<?php
include('sidebar.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
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
        img{
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
    <div id="content">
        <h1>User Information</h1>
        <table>
            <tr>
                <th>User ID</th>
                <th>Image</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>
            <?php
            // Retrieve User Data from table
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>$row[user_id]</td>
                            <td><img src='".$row['img']."'></td>
                            <td>$row[first_name]</td>
                            <td>$row[last_name]</td>
                            <td>$row[gender]</td>
                            <td>$row[email]</td>
                            <td>$row[phone]</td>
                            <td>$row[address]</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No users found in the database.</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>
</body>

</html>