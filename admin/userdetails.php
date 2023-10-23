<?php
include('sidebar.php');

$uid = $_GET['uid'];
$query__roduct = "SELECT * FROM users WHERE  user_id = '$uid'";
$result_row = mysqli_query($conn, $query__roduct);
$row = mysqli_fetch_assoc($result_row);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User details</title>
    <style>
        .content {
            margin-left: 220px;
            padding: 20px;
        }
        .user .btn {
            width: 120px;
            padding: 8px 10px;
            font-size: 15px;
            border: 0;
            background-color: #333;
            color: #fff;
            border-radius: 3px;
            cursor: pointer;
            text-align: center;
            margin-left: 20px;
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

        .content .form .input_field img {
            margin-top: 10px;
            height: 90px;
            width: 90px;
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


    </style>
</head>
<body>
<div class="content">
        <div class="title">
            <h1>User Details</h1>
            <div class="user">
                <a href="com/delete.php?uid=<?php echo $row['user_id']; ?>">
                    <button type="submit" name="delete" class="btn">Delete user account</button>
                </a>
            </div>
        </div>
        <div class="form">
                <div class="input_field">
                    <img src="../user/<?php echo $row['img']; ?>" alt="Current Image">
                </div>
                <div class="input_field">
                    <label>User id</label>
                    <input type="text" value="<?php echo $row['user_id']; ?>" class="input" name="pid" required>
                </div>
                <div class="input_field">
                    <label>First Name</label>
                    <input type="text" value="<?php echo $row['first_name']; ?>" class="input" name="name" required>
                </div>
                <div class="input_field">
                    <label>Last Name</label>
                    <input type="text" value="<?php echo $row['last_name']; ?>" class="input" name="price" required>
                </div>
                <div class="input_field">
                    <label>Gender</label>
                    <input type="text" value="<?php echo $row['gender']; ?>" class="input" name="quan" required>
                </div>
                <div class="input_field">
                    <label>e-mail</label>
                    <input type="text" value="<?php echo $row['email']; ?>" class="input" name="c_id" required>
                </div>
                <div class="input_field">
                    <label>Phone</label>
                    <input type="text" value="<?php echo $row['phone']; ?>" class="input" name="c_id" required>
                </div>
                <div class="input_field">
                    <label>Address</label>
                    <input type="text" value="<?php echo $row['address']; ?>" class="input" name="c_id" required>
                </div>
            </div>
</body>
</html>
