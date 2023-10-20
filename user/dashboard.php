<?php
include "../db_connection.php";
session_start();
if (isset($_SESSION["user_id"])) {
    $userId = $_SESSION["user_id"];

    $sql = "SELECT * FROM users WHERE user_id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "User ID: " . $row["user_id"] . "<br>";
            echo "First Name: " . $row["first_name"] . "<br>";
            echo "Last Name: " . $row["last_name"] . "<br>";
            echo "Email: " . $row["email"] . "<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
} else {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="log-out">
        <a href="../logout.php">
            <div class="logout">
                <input type="submit" value="Log Out" name="log_out" class="btn">
            </div>
        </a>
    </div>
</body>
</html>
