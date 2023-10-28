<?php
include "../..db_connection.php";
$selectedMonth = $_POST['selectedMonth']; // Assuming the selected month is sent via a POST request

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query
$sql = "SELECT p.product_id, p.name, SUM(oi.quantity) AS total_delivered_quantity
        FROM products p
        JOIN order_items oi ON p.product_id = oi.product_id
        JOIN orders o ON oi.order_id = o.order_id
        WHERE o.order_status = 'Delivered'
        AND MONTH(o.order_date) = $selectedMonth
        GROUP BY p.product_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "Product ID: " . $row["product_id"]. " - Name: " . $row["name"]. " - Total Delivered Quantity: " . $row["total_delivered_quantity"]. "<br>";
    }
} else {
    echo "No results found.";
}

// Close the connection
$conn->close();
?>
