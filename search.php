<?php
// Include your database connection here
include 'db_connection.php';

if (isset($_GET['search'])) {
   if ($_GET['search'] == '') {
      echo "Please enter product name";
   } else {
      $search = $_GET['search'];
      $query = "SELECT * FROM products WHERE name LIKE '%$search%'";
      $result = mysqli_query($conn, $query);
      if (strlen($query) > 0) {
         if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
               echo '<a href="product.php?pid=' . $row['product_id'] . '" class="card">';
               echo '<img src="img/' . $row['img'] . '" alt="Product Image">';
               echo '<div class="container">';
               echo '<h3>' . $row['name'] . '</h3>';
               echo '<p>$' . $row['price'] . '</p>';
               echo '</div>';
               echo '</a>';
               echo '<hr>';
            }
         } else {
            echo "No results found";
         }
      } else {
         echo "Query length is 0";
      }
   }
}
if (isset($_GET['userId'])) {
   $userId = $_GET['userId'];
   $query = "SELECT * FROM cart WHERE user_id = $userId";
   $result = mysqli_query($conn, $query);

   if ($result) {
       while ($row = mysqli_fetch_assoc($result)) {
           echo '<div class="container">';
           echo '<h3>' . $row['name'] . '</h3>';
           echo '<p>$' . $row['price'] . '</p>';
           echo '<p>Quantity: ' . $row['quantity'] . '</p>'; // Include the quantity in the output
           echo '</div>';
           echo '</a>';
           echo '<hr>';
       }
   } else {
       echo "No results found";
   }
}


?>
