<?php
include('sidebar.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
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
    </style>
    <!-- Add your CSS styles and other meta tags here -->
</head>

<body>
    <div id="content">
        <h1>Order Dashboard</h1>
        <table>
            <tr>
                <th>Order Status</th>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <tbody>
                <?php
                // Query to fetch orders, customers, and product information
                $sql = "SELECT o.order_id,o.order_status, u.first_name, p.name, p.img, oi.quantity
                FROM orders o
                JOIN users u ON o.customer_id = u.user_id
                JOIN order_items oi ON o.order_id = oi.order_id
                JOIN products p ON oi.product_id = p.product_id";

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                        <td>{$row['order_status']}</td>
                        <td>{$row['order_id']}</td>
                        <td>{$row['first_name']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['quantity']}</td>
                        <td><img src='" . $row['img'] . "'></td>
                        <td>
                          <a href='status.php?oid={$row['order_id']}'>Action</a>
                        </td>
                    </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No orders found.</td></tr>";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>


</body>

</html>