<?php
include('../../db_connection.php');

if (isset($_GET['oid'])) {
    $order_id = $_GET['oid'];

    // Update the order status to "shipping"
    $update_sql = "UPDATE orders SET order_status = 'shipping' WHERE order_id = $order_id";

    if (mysqli_query($conn, $update_sql)) {
        echo "Order status updated to 'shipping' successfully.";

        // Get the order date and user's delivery address from the respective tables
        $get_order_info_sql = "SELECT o.order_date, u.address
                               FROM orders o
                               JOIN users u ON o.customer_id = u.user_id
                               WHERE o.order_id = $order_id";

        $result = mysqli_query($conn, $get_order_info_sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Extract the order date and delivery address
            $order_date = $row['order_date'];
            $delivery_address = $row['delivery_address'];

            // Insert a new shipping record with the obtained information
            $insert_sql = "INSERT INTO shipping (order_id, shipping_date, delivery_address, shipping_status)
                           VALUES ($order_id, '$order_date', '$delivery_address', 'pending')";

            if (mysqli_query($conn, $insert_sql)) {
                echo "Shipping record created successfully.";
            } else {
                echo "Error creating shipping record: " . mysqli_error($conn);
            }
        } else {
            echo "Error retrieving order information.";
        }
    } else {
        echo "Error updating order status: " . mysqli_error($conn);
    }
} else {
    echo "Order ID not provided.";
}

mysqli_close($conn); // Close the database connection
?>
