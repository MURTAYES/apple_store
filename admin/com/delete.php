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
        echo "Order succesfully deleted ";
        header("Location: ../orders.php");
        exit();
    } else {
        echo "Error deleting order: ";
    }
}
if (isset($_GET['uid'])) {

    $uid = $_GET['uid'];
    $sql = "DELETE FROM users WHERE user_id = $uid";

    if (mysqli_query($conn, $sql)) {
        echo "User account deleted succesfully";
        header("Location: ../user.php");
        exit();
    } else {
        echo "Error deleting user account: ";
    }
}


mysqli_close($conn);
?>
