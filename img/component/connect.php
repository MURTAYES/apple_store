<?php

$db_name = 'mysql:host=localhost;dbname=apple';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);
// if($conn){
//     echo "connection succesfull";
// }
?>