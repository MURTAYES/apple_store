<?php
// Include your database connection here
include 'db_connection.php';


if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT * FROM products WHERE name LIKE '%$search%'";
    $result = mysqli_query($conn, $query);
    if (strlen($query) > 0) {
        if (mysqli_num_rows($result) > 0) {
         while ($row = mysqli_fetch_assoc($result)) {
            echo "<a href='your_link_here'>" . $row['name'] . "</a><br>";
         }
        }else {
             echo "No results found";
        }
   }
}
?>