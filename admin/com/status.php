<?php
include "../../db_connection.php";
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

$oid = $_GET['oid'];
$query_order = "SELECT * FROM orders WHERE  order_id = '$oid'";
$query = mysqli_query($conn, $query_order);
$result = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
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
        }

        #content table td a {
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

        img {
            height: 90px;
            width: 65px;
        }
        .delete .btn,.shipping .btn,.back .btn, .Delivered .btn {
            width: 120px;
            padding: 8px 10px;
            font-size: 15px;
            border: 0;
            background-color: red;
            color: #fff;
            border-radius: 3px;
            cursor: pointer;
            text-align: center;
            margin-left: 20px;
        }

        .delete .btn:hover,.shipping .btn:hover,.back .btn:hover, .Delivered .btn:hover {
            background-color: #555;
        }
        .shipping .btn {
            margin-top: 5px;
            background-color: green;
        }
        .back .btn{
            margin-top: 5px;
            background-color: #333;
        }
        .Delivered .btn{
            margin-top: 5px;
            background-color: blue;
        }

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status</title>
</head>

<body>
    <div id="content">
        <h1>Order Dashboard</h1>
        <table>
            <div class="delete">
                <a href="delete.php?oid=<?php echo $oid; ?>">
                    <button type="submit" name="delete" class="btn">Delete orders</button>
                </a>
            </div>
            <div class="shipping">
                <a href="shipping.php?oid=<?php echo $oid; ?>">
                    <button type="submit" name="shipping" class="btn">Shipping</button>
                </a>
            </div>
            <div class="Delivered">
                <a href="shipping.php?oid=<?php echo $oid; ?>&s=1">
                    <button type="submit" name="delivered" class="btn">Delivered</button>
                </a>
            </div>
            <div class="back">
                <a href="../orders.php">
                    <button type="submit" name="shipping" class="btn">Back</button>
                </a>
            </div>
            <tr>
                <th>Order Status</th>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Image</th>
            </tr>
            <tbody>
                <?php
                $sql = "SELECT o.order_id, o.order_status, u.first_name, p.name, p.img, oi.quantity
                        FROM orders o
                         JOIN users u ON o.customer_id = u.user_id
                         JOIN order_items oi ON o.order_id = oi.order_id
                         JOIN products p ON oi.product_id = p.product_id
                        WHERE o.order_id = $oid";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                        <td>{$row['order_status']}</td>
                        <td>{$row['order_id']}</td>
                        <td>{$row['first_name']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['quantity']}</td>
                        <td><img src='../" . $row['img'] . "'></td>
                    </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No orders found.</td></tr>";
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>