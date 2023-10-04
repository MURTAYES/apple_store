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
        .title{
            position: absolute;
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .add .btn {
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

        .add .btn:hover {
            background-color: #555;
        }

        #content {
            margin-left: 220px;
            padding: 20px;
        }

        #content table {
            margin-top: 80px;
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
        #content table td a{
            width: 100%;
            padding: 8px 10px;
            font-size: 15px;
            border: 0;
            background-color: #333;
            color: #fff;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
        }
        img{
            height: 90px;
            width: 65px;
        }
    </style>
</head>

<body>
    <div id="content">
        <div class="title">
        <h1>Inventory details</h1>
        <div class="add">
            <a href="add.php">
                    <input type="submit" value="Add product" name="add" class="btn">
            </a>
        </div>
        </div>

        <table>
            <tr>
                <th>category_id</th>
                <th>Image</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>price</th>
                <th>quantity</th>
                <th>Colour</th>
                <th>Option</th>
            </tr>
            <?php
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td> $row[category_id]  </td>
                            <td> <img src='".$row['img']."'>  </td>
                            <td> $row[product_id]   </td>
                            <td> $row[name]         </td>
                            <td> $row[price]        </td>
                            <td> $row[quantity]     </td>
                            <td> $row[colour]        </td>
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