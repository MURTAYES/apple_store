<?php
include('sidebar.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../component/image/apple(1).png" type="image/x-icon">
    <title>Profile</title>
    <style>
        .content {
            margin-left: 220px;
            padding: 20px;
        }

        .content .form {
            width: 80%;
        }

        .content .form .input_field {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .content .form .input_field label {
            width: 200px;
            margin-right: 10px;
            font-size: 15px;
        }

        .content .form .input_field .input {
            width: 100%;
            outline: none;
            border: 1px solid #333;
            font-size: 15px;
            padding: 8px 10px;
            border-radius: 3px;
        }

        .content .form .input_field textarea {
            width: 100%;
            outline: none;
            border: 1px solid #333;
            font-size: 15px;
            padding: 8px 10px;
            border-radius: 3px;
            height: 80px;
            resize: none;
        }

        .content .form .input_field select {
            width: 100%;
            position: relative;
            height: 40px;
            border: 1px solid #333;
            border-radius: 3px;
        }

        .content .form .input_field select {
            padding: 8px 10px;
        }

        .content .form .input_field a {
            color: #333;
            font-size: 15px;
            margin-top: 8px;
        }

        .content .form .input_field a:hover {
            color: #555;
        }

        .content .form .input_field .check {
            width: 18px;
            height: 18px;
            margin-top: 10px;
        }

        .content .form .input_field .btn {
            width: 100%;
            padding: 8px 10px;
            font-size: 15px;
            border: 0;
            background-color: #333;
            color: #fff;
            border-radius: 3px;
            cursor: pointer;
        }

        .content .form .input_field .btn:hover {
            background-color: #555;
        }
    </style>
</head>

<body>

    <div class="content">
        <form action="#" method="post">
            <div class="title">
                <h2>User details</h2>
            </div>
            <div class="form">
                <div class="input_field">
                    <label>User Name</label>
                    <input type="text" value="<?php echo $details['username'] ?>" class="input" name="username" required>
                </div>
                <div class="input_field">
                    <label>Full Name</label>
                    <input type="text" value="<?php echo $details['full_name'] ?>" class="input" name="full_name" required>
                </div>
                <div class="input_field">
                    <label>Email Address</label>
                    <input type="text" value="<?php echo $details['email'] ?>" class="input" name="email" required>
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
                    <input type="submit" value="Update details" class="btn" name="update">
                </div>
            </div>
        </form>

<?php

if (isset($_POST['update'])) {
    $username = $_POST["username"];
    $full_name =  $_POST["full_name"];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $conpass = $_POST['conpass'];


    if ($pass !== $conpass) {
        echo "Password and Confirm Password do not match. Please go back and try again.";
    }


    // Insertiing data to users table in database
    $sql = "UPDATE admins SET username = '$username', full_name = '$full_name', email = '$email', password = '$pass' WHERE admin_id = '$id' ";

    if (mysqli_query($conn, $sql)) {
        echo "User information updated successfully.";
    } else {
        echo "Error updating user information: " . mysqli_error($conn);
    }
}
// Close the database connection
$conn->close();
?>
    </div>
</body>

</html>
