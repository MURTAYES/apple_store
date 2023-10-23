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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="shortcut icon" href="component/image/apple.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP FORM</title>
</head>
<body>
    <div class="container">
        <form action="#" method="post">
            <div class="title">
                <a href="index.php">
                    <img src="img/component/image/apple(1).png" alt="">
                </a>
                <h2>SIGN UP FORM</h2>
            </div>
            <div class="form">
                <div class="input_field">
                    <label>First Name</label>
                    <input type="text" class="input" name="fname" required>
                </div>
                <div class="input_field">
                    <label>Last Name</label>
                    <input type="text" class="input" name="lname" required>
                </div>
                <div class="input_field">
                    <label>Gender</label>
                    <select name="gender" required>
                        <option disabled selected>Select an option</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Others</option>
                    </select>
                </div>
                <div class="input_field">
                    <label>Email Address</label>
                    <input type="text" class="input" name="email" required>
                </div>
                <div class="input_field">
                    <label>Phone Number</label>
                    <input type="text" class="input" name="phone" required>
                </div>
                <div class="input_field">
                    <label>Password</label>
                    <input type="password" class="input" name="pass" required>
                </div>
                <div class="input_field">
                    <label>Confirm Password</label>
                    <input type="password" class="input" name="conpass" required>
                </div>
                <div class="input_field">
                    <label>Address</label>
                    <textarea name="address"></textarea>
                </div>
                <div class="input_field">
                    <label class="check">
                        <input type="checkbox" required>
                    </label>
                    <a href="">Agrees to terms and condition</a>
                </div>
                <div class="input_field">
                    <input type="submit" value="Sign Up" class="btn" name="sign_up">
                </div>
            </div>
        </form>
    </div>

</body>

</html>

<!-- php -->
<!-- taking_input_from_user_and_storing_into_database -->

<?php
if (isset($_POST['sign_up'])) {
    $fname = $_POST["fname"];
    $lname =  $_POST["lname"];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $conpass = $_POST['conpass'];
    $address = $_POST['address'];

    if (empty($gender)) {
        echo "Gender is required. Please go back and fill in the required fields.";
    }

    //check if password and confirm password matches
    if ($pass !== $conpass) {
        echo "Password and Confirm Password do not match. Please go back and try again.";
    }


    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
    $emailResult = $conn->query($checkEmailQuery);

    if ($emailResult->num_rows > 0) {
        echo "Email address already exists. Please use a different email.";
        $conn->close();
        exit();
    }
    // Check if the email contains the "@" symbol
    if (strpos($email, "@") === false) {
        echo "Email address must contain the '@' symbol.";
        exit();
    }


    // Insertiing data to users table in database
    $sql = "INSERT INTO users (first_name, last_name, gender, email, phone, password, address)
            VALUES ('$fname', '$lname', '$gender', '$email', '$phone', '$pass', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "User data inserted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>
