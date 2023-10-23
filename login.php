<?php
include "db_connection.php";
session_start();
if (isset($_SESSION["admin_id"])) {
   header("Location: admin/admindashboard.php");
}
if (isset($_SESSION["user_id"])) {
   header("Location: userr/dashboard.php");
}
?>
<!DOCTYPE html>
<html>

<head>
   <title>Login</title>
   <link rel="shortcut icon" href="component/image/apple.png" type="image/x-icon">
   <link rel="stylesheet" type="text/css" href="css/login.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
   <div class="container">
      <div class="title">
         <img src="img/component/apple(1).png" alt="">
         <h2>LOGIN</h2>
      </div>
      <form action="#" method="post">
         <div class="form">
            <div class="input_field">
               <label>User email</label>
               <input type="text" class="input" name="email" required>
            </div>
            <div class="input_field">
               <label>Password</label>
               <input type="password" class="input" name="pass" required>
            </div>
            <div class="input_field">
               <input type="submit" value="Log IN" name="log_in" class="btn">
            </div>
            <div class="signup_here">
               <p>Don't have any account? <br><a href="signup.php">Sign Up here</a></p>
            </div>
         </div>
      </form>

   </div>

</body>

</html>

<?php
 include('db_connection.php');

session_start();

if (isset($_POST['log_in'])) {
   $email = $_POST['email'];
   $pass = $_POST['pass'];

   // Check if the email and password match an admin record in the database
   $query_admin = "SELECT admin_id FROM admins WHERE email = '$email' AND password = '$pass'";
   $result_admin = mysqli_query($conn, $query_admin);

   // Check if the email and password match an users record in the database
   $query_user = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
   $result_user = mysqli_query($conn, $query_user);

   if (mysqli_num_rows($result_admin) == 1) {
      $row = mysqli_fetch_assoc($result_admin);
      $adminId = $row['admin_id'];

      $_SESSION["admin_id"] = $adminId;
      header("Location: admin/admindashboard.php");
      exit;
   } if (mysqli_num_rows($result_user) == 1) {
      $row = mysqli_fetch_assoc($result_user);
      $userid = $row['user_id'];

      session_start(); // Start the session if it hasn't been started yet
      $_SESSION["user_id"] = $userid;
      header("Location: index.php");
      exit;
   } else {
      echo "Login failed. Please check your email and password.";
   }
}

?>
