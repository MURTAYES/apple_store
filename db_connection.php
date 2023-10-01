<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$database = "apple";

$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn) {
    //echo "connection succesfull";
}else{
    echo "connection failed".mysqli_connect_error();
}

?>
