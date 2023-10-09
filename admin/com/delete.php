<?php
include('../../db_connection.php');
if (isset($_GET['pid'])) {

    $pid = $_GET['pid'];
    echo $pid;
    $sql = "DELETE FROM products WHERE product_id = $pid";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../inventory.php");
        exit();
    } else {
        echo "Error deleting product: ";
    }
}
if (isset($_GET['oid'])) {

    $oid = $_GET['oid'];
    $sql = "DELETE FROM orders WHERE order_id = $oid";

    if (mysqli_query($conn, $sql)) {
        echo "Orders succesfully deleted ";
        header("Location: ../orders.php");
        exit();
    } else {
        echo "Error deleting product: ";
    }
}

mysqli_close($conn);
?>
