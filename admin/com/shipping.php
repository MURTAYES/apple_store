<?php
include('../../db_connection.php');

if(isset($_GET['s'])){
    $oid = $_GET['oid'];

    $sql = "UPDATE orders SET order_status = 'Delivered' WHERE order_id = $oid";

    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {
        echo "Order set for shipping";
        header("Location: ../orders.php");
        exit();
    } else {
        echo "Error changing status: " . mysqli_error($conn);
    }
}else if (isset($_GET['oid'])) {
    $oid = $_GET['oid'];

    $sql = "UPDATE orders SET order_status = 'Shipping' WHERE order_id = $oid";

    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {
        echo "Order set for shipping";
        header("Location: ../orders.php");
        exit();
    } else {
        echo "Error changing status: " . mysqli_error($conn);
    }
}
?>
