<?php
include('sidebar.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../component/image/apple(1).png" type="image/x-icon">
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
    </style>
</head>

<body>
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