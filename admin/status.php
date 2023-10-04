<?php
include('sidebar.php');

$oid = $_GET['pid'];
$query__roduct = "SELECT * FROM orders WHERE  order_id = '$oid'";
$result_product = mysqli_query($conn, $query__roduct);
$product = mysqli_fetch_assoc($result_product);
?>