<?php
    include('db_connection.php');
    $sql = "SELECT * FROM products";
    $all_product = $conn->query($sql);
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mac</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <header>
  <?php
      include('header.php');
      ?>
   </header>
    
    <div class="hc">
      <h6>New</h6>
      <h1>MacBook Air 15”</h1>
      <h2>Impressively big. Impossibly thin.</h2>
      <p>From $108.25/mo. for 12 mo. or $1299**</p>
      <button class="custom-button">Buy</button>
      <img src="macbook1.png">

      <main>
     <?php
      while ($row = mysqli_fetch_assoc($all_product)) {
      ?>
       <form action="" method="post" class="box">
         <div class="card">
           <div class="image">
             <img src="img/<?php echo $row["img"]; ?>" alt="">
           </div>
           <div class="caption">
             <p class="product_name"><?php echo $row["name"];  ?></p>
             <p class="price"><b>$<?php echo $row["price"]; ?></b></p>
           </div>
           <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
           <input type="submit" value="add to cart" class="btn" name="add_to_cart">
         </div>
       </form>
     <?php
      }
      ?>
   </main>
   <?php
    include('footer.php');
    ?>
      
    </div>
    
  
</html>