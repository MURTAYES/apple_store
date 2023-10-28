<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Page</title>
</head>
<body>
  <section><h1> Profile</h1>
    <div class = "container">
    <div class="input_field">
    <form action="#" method="post" enctype="multipart/form-data">
        <label for="profile_picture">Choose a profile picture</label>
        <input type="file" name="profile_picture" id="profile_picture" >
        <input type="submit" value="Upload">
</form>
</div>
</section>
<section><style>
  .button {
    background-color: white;
    color: black;
    border: 1px solid black;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 10px;
    cursor: pointer;
  }
</style>

<button class="button" id="shipped-orders">Shipped Orders</button>
<button class="button" id="pending-orders">Pending Orders</button>
<button class="button" id="pending-payments">Pending Payments</button>

</section>
<section>
<div id="content">
        <div class="orders-header">
            <h1>Orders delivered</h1>
            <a href="com/orderhistory.php"><img src="../img/component/history.png" alt=""></a>
        </div>

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
                $sql = "SELECT o.order_id, o.order_status, u.first_name, p.name, p.img, oi.quantity
                        FROM orders o
                         JOIN users u ON o.customer_id = u.user_id
                         JOIN order_items oi ON o.order_id = oi.order_id
                         JOIN products p ON oi.product_id = p.product_id
                        WHERE o.order_status = 'delivered'";


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
                          <a href='com/status.php?oid={$row['order_id']}'>Action</a>
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
</section>
</body>
</html>
<?php
include "../db_connection.php";
echo "Welcome user";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadDir = "uploads/"; // Create a directory to store uploaded files
    $uploadFile = $uploadDir . basename($_FILES["profile_picture"]["name"]);

    if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $uploadFile)) {
        echo nl2br("\n Profile picture uploaded successfully!");
        // You can save the $uploadFile path to a database or use it as needed.
    } else {
        echo "\n Sorry, there was an error uploading your file.";
    }
}
?>

