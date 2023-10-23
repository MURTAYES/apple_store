<?php
include('sidebar.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        #content {
            margin-left: 220px;
            padding: 20px;
        }

        #content table {
            width: 80%;
            text-align: center;
            padding: 15px auto;
            border-collapse: collapse;
        }

        #content table th {
            background-color: #333;
            color: #fff;
            padding: 5px;
        }

        #content table tr {
            border-bottom: 1px solid #fff;
        }

        #content table td {
            background-color: #999;
            color: #fff;
            padding: 5px;
        }
        #content table td a{
            text-decoration: none;
        }
        img{
            width: 50px;
            height: 50px;
        }
        /*search*/
        .search-box {
            display: flex;
            align-items: center;
            background-color: #fff;
            border-radius: 5px;
            padding: 5px;
            margin-right: 30px;
        }

        .search-box input[type="text"] {
            border: 1px solid;
            border-radius: 5px;
            outline: none;
            width: 100px;
            padding: 5px;
        }
        .btn {
            width: 80px;
            padding: 8px 10px;
            font-size: 12px;
            border: 0;
            background-color: #333;
            color: #fff;
            border-radius: 3px;
            cursor: pointer;
            text-align: center;
            margin-left: 20px;
        }

        .btn:hover {
            background-color: #555;
        }

    </style>
</head>

<body>
    <div id="content">
        <h1>User Information</h1>
        <form method="post">
        <div class="search-box">
            <input type="text" name="search" placeholder="Search user.....">
            <input type="submit" value="Search" name="submit" class="btn">
        </div>
        </form>
        <table>
           
            <?php
            if(isset($_POST['submit'])){
                $search=$_POST['search'];
                $sql = "SELECT * FROM users WHERE user_id='$search'
                                                OR first_name LIKE '$search'
                                                OR last_name LIKE '$search'
                                                OR email='$search'
                                                OR phone='$search'";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                   echo" <tr>
                            <th>User ID</th>
                            <th>Image</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                        </tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td><a href='userdetails.php?uid={$row['user_id']}'> $row[user_id]</a></td>
                                <td><img src='../user/".$row['img']."'></td>
                                <td>$row[first_name]</td>
                                <td>$row[last_name]</td>
                                <td>$row[gender]</td>
                                <td>$row[email]</td>
                                <td>$row[phone]</td>
                                <td>$row[address]</td>
                              </tr>";
                    }
                }else{
                    echo "Match Not found";
                }
            }else{
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo" <tr>
                            <th>User ID</th>
                            <th>Image</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                        </tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td><a href='userdetails.php?uid={$row['user_id']}'> $row[user_id]</a></td>
                            <td><img src='../user/".$row['img']."'></td>
                            <td>$row[first_name]</td>
                            <td>$row[last_name]</td>
                            <td>$row[gender]</td>
                            <td>$row[email]</td>
                            <td>$row[phone]</td>
                            <td>$row[address]</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No users found in the database.</td></tr>";
            }
            }
            $conn->close();
            ?>
        </table>
    </div>
</body>

</html>
