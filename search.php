<?php
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
               echo '<a href="quickview.php?pid=' . $row['product_id'] . '" class="card">';
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
?>
