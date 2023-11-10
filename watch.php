<?php
include('db_connection.php');
$sql = "SELECT * FROM products where category_id=5";
$product = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    /*section3*/
    #section {
      display: flex;
      align-items: flex-start;
      justify-content: center;
      height: 100vh;
      background-image: url('img/component/watch.jpg');
      background-size: cover;
      background-repeat: no-repeat;
    }

    #section .text-container {
      position: absolute;
      text-align: center;
      margin-top: 80px;
    }

    #section .text-container img {
      width: 48px;
      height: 48px;
      display: inline-block;
      vertical-align: middle;
    }

    #section .text-container h1 {
      font-size: 40px;
      display: flex;
      align-items: center;
      display: inline-block;
      color: #fff
    }

    #section .text-container h2 {
      font-size: 20px;
      font-weight: bold;
      color: #B71515;
      letter-spacing: 3px;
    }

    #section .text-container p {
      font-size: 25px;
      padding-top: 10px;
    }
    /*section2*/
    #section2 {
      display: flex;
      align-items: flex-start;
      justify-content: center;
      height: 100vh;
      background-image: url('img/component/watch2.jpg');
      background-size: cover;
      background-repeat: no-repeat;
    }

    .text-container3 {
      position: absolute;
      text-align: center;
      margin-top: 80px;
    }

    .text-container3 img {
      width: 48px;
      height: 48px;
      display: inline-block;
      vertical-align: middle;
    }

    .text-container3 h1 {
      font-size: 40px;
      display: flex;
      align-items: center;
      display: inline-block;
      color: #000;
    }

    .text-container3 h2 {
      font-size: 40px;
      font-weight: bold;
      color: #000;
      letter-spacing: 3px;
    }

    .text-container3 p {
      font-size: 15px;
      color: #FD8E4D;
    }

    #section3 {
      display: flex;
      align-items: flex-start;
      justify-content: center;
      height: 100vh;
      background-image: url('img/component/watch3.png');
      background-size: cover;
      background-repeat: no-repeat;
    }

    .button {
      padding: 10px 20px;
      background-color: #2381DB;
      color: #fff;
      border: none;
      border-radius: 20px;
      cursor: pointer;
      margin-top: 20px;
    }

    .button:hover {
      background-color: #555;
    }

    .products {
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    .products .heading {
      top: 80px;
      text-align: center;
      font-size: 24px;
      margin-bottom: 20px;
      margin: 80px 0;
    }

    .products .box-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      grid-gap: 30px;
    }

    .products .box {
      border: 1px solid #ccc;
      padding: 20px;
    }

    .products .box form {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .products .box img {
      width: 97px;
      height: 135px;
      margin-bottom: 10px;
    }

    .products .box .name {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
      text-align: center;
    }

    .products .box .flex {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
    }

    .products .box .flex .price {
      font-size: 16px;
    }

    .products .box .flex .price span {
      margin: 0 5px;
    }

    .products .box .qty {
      width: 50px;
      height: 30px;
      text-align: center;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .products .box .btn {
      padding: 10px 20px;
      background-color: #333;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      text-align: center;
      width: 100%;
    }

    .products .box .btn:hover {
      background-color: #555;
    }

    .products .empty {
      text-align: center;
      font-size: 18px;
      margin-top: 20px;
    }
  </style>
  <title>watch</title>
</head>
<header>
  <?php
  include('header.php');
  ?>
</header>
<?php include 'header.php'; ?>
<section id="section">
  <div class="text-container">
    <img src="img/component/apple.png" alt="">
    <h1>WATCH</h1>
    <h2>SERIES 9</h2>
    <p>Smarter.Brighter.Mighter</p>
    <a href="quickview.php?pid=116">
      <button class="button">Buy Now</button>
    </a>
  </div>
</section>
<section id="section2">
  <div class="text-container3">
    <img src="img/component/apple(1).png" alt="">
    <h1>WATCH</h1>
    <p>Ultra 2</p>
    <h2>Next level adventure.</h2>
    <a href="quickview.php?pid=116">
      <button class="button">Buy Now</button>
    </a>
  </div>
</section>
<section id="section3">
</section>
<section class="products">
  <h1 class="heading">Watch</h1>
  <div class="box-container">
    <?php
    if ($product->num_rows > 0) {
      while ($row = $product->fetch_assoc()) {
    ?>

        <div class="box">
          <form action="" method="post">
            <input type="hidden" name="pid" value="<?= $row['product_id']; ?>">
            <input type="hidden" name="name" value="<?= $row['name']; ?>">
            <input type="hidden" name="price" value="<?= $row['price']; ?>">
            <button type="submit" name="add_to_wishlist" class="fas fa-heart"></button>
            <a href="quick_view.php?pid=<?= $row['id']; ?>" class="fas fa-eye"></a>
            <a href="quickview.php?pid=<?= $row['product_id']; ?>">
              <img src="img/<?= $row['img']; ?>" alt="">
            </a>
            <div class="name"><?= $row['name']; ?></div>
            <div class="flex">
              <div class="price"><span>$</span><?= $row['price']; ?><span>/-</span></div>
              <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
            </div>
            <input type="submit" value="Add to Cart" class="btn" name="add_to_cart">
          </form>
        </div>
    <?php
      }
    } else {
      echo '<p class="empty">No products found!</p>';
    }
    ?>
  </div>
</section>
<?php
include('footer.php');
?>

</html>

<?php
if (isset($_POST['add_to_cart'])) {
  if ($_SESSION['user_id'] == '') {
    header('location:user_login.php');
  } else {
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    $check_cart_query = "SELECT * FROM cart WHERE name = '$name' AND user_id = {$_SESSION['user_id']}";
    $check_cart_result = mysqli_query($conn, $check_cart_query);

    if (mysqli_num_rows($check_cart_result) > 0) {
      echo '<script>alert("Already added to cart!");</script>';
      echo '<script>window.location = window.location.href;</script>';
    } else {
      $insert_cart_query = "INSERT INTO cart (user_id, pid, name, price, quantity) VALUES ({$_SESSION['user_id']}, '$pid', '$name', $price, $qty)";
      $insert_cart_result = mysqli_query($conn, $insert_cart_query);
      if ($insert_cart_result) {
        $message[] = 'Added to cart!';
        echo '<script>alert("Product added to cart!");</script>';
        echo '<script>window.location = window.location.href;</script>';
        exit;
      } else {
        // Handle insertion error
        $message[] = 'Error adding to cart!';
      }
    }
  }
}
?>