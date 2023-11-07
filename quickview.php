<?php
include 'header.php';
$pid = $_GET['pid'];
$query__roduct = "SELECT * FROM products WHERE  product_id = '$pid'";
$result_product = mysqli_query($conn, $query__roduct);
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>quick view</title>
   <style>
      .quick-view {
         width: 100%;
         max-width: 800px;
         margin: 0 auto;
         padding: 20px;
      }

      .quick-view .heading {
         text-align: center;
         font-size: 24px;
         margin-bottom: 20px;
      }

      .quick-view .box {
         padding: 20px;
         margin-bottom: 20px;
      }

      .quick-view .box .row {
         display: flex;
      }

      .quick-view .box .row .image {
         flex: 0 0 30%;
         margin-right: 20px;
      }

      .quick-view .box .row .image img {
         max-width: 100%;
         height: auto;
      }

      .quick-view .box .row .content {
         flex: 0 0 70%;
      }

      .quick-view .box .row .content .name {
         font-size: 20px;
         font-weight: bold;
         margin-bottom: 10px;
      }

      .quick-view .box .row .content .flex {
         margin-top: 10px;
         justify-content: space-between;
         margin-bottom: 10px;
      }

      .quick-view .box .row .content .flex .price {
         font-size: 18px;
         margin-top: 20px;
      }

      .quick-view .box .row .content .flex .price span {
         margin: 0 5px;
      }

      .quick-view .box .row .content .qty {
         width: 50px;
         height: 30px;
         text-align: center;
         border: 1px solid #ccc;
         border-radius: 5px;
         margin-left: 10px;
      }

      .quick-view .box .row .content .btn .btn {
         padding: 10px 20px;
         background-color: #4CAF50;
         color: white;
         border: none;
         border-radius: 5px;
         cursor: pointer;
         font-size: 16px;
      }

      .quick-view .box .row .content .btn .btn:hover {
         background-color: #45a049;
      }
   </style>
</head>

<body>

   <?php include 'components/user_header.php'; ?>

   <section class="quick-view">

      <h1 class="heading">quick view</h1>

      <?php

      if ($result_product->num_rows > 0) {
         while ($product = $result_product->fetch_assoc()) {
      ?>
            <form action="" method="post" class="box">
               <input type="hidden" name="pid" value="<?= $product['product_id']; ?>">
               <input type="hidden" name="name" value="<?= $product['name']; ?>">
               <input type="hidden" name="price" value="<?= $product['price']; ?>">
               <input type="hidden" name="image" value="<?= $product['img']; ?>">
               <div class="row">
                  <div class="image">
                     <img src="img/<?= $product['img']; ?>" alt="">
                  </div>
                  <div class="content">
                     <div class="name"><?= $product['name']; ?></div>
                     <div class="flex">
                        <div class="price"><span>$</span><?= $product['price']; ?><span>/-</span></div>
                        <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
                     </div>
                     <div class="btn">
                        <input type="submit" value="add to cart" class="btn" name="add_to_cart">
                     </div>
                  </div>
               </div>
            </form>
      <?php
         }
      } else {
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>

   </section>
   <?php
    if (isset($_POST['add_to_cart'])) {

        if ($_SESSION['user_id'] == '') {
            header('location:user_login.php');
        } else {

            $pid = $_POST['pid'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];

            $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
            $check_cart_numbers->execute([$name, $_SESSION['user_id']]);
            $result = $check_cart_numbers->get_result();

            if ($result->num_rows > 0) {
                $message[] = 'Already added to cart!';
            } else {

                $insert_cart = $conn->prepare("INSERT INTO `cart` (user_id, pid, name, price, quantity) VALUES (?, ?, ?, ?, ?)");
                $insert_cart->execute([$_SESSION['user_id'], $pid, $name, $price, $qty]);
                $message[] = 'Added to cart!';
            }
        }
    }

    include 'footer.php';
    ?>


</body>

</html>