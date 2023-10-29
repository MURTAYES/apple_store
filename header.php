<?php
include "db_connection.php";
session_start();
if (isset($_SESSION["user_id"])) {

    $userId = $_SESSION["user_id"];

    $query = "SELECT * FROM users WHERE user_id = $userId";
    $result = mysqli_query($conn, $query);
    $details = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap');

        * {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        header {
            background-color: #111112;
            color: #fff;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
        }


        .logo img {
            width: 50px;
            height: 50px;
            margin-right: 20px;
        }


        ul.menu {
            list-style: none;
            display: flex;
        }

        ul.menu li {
            margin-right: 20px;
        }


        ul.menu li a {
            text-decoration: none;
            color: #fff;
        }

        .utility {
            display: flex;
            align-items: center;
        }

        .utility img {
            width: 30px;
            height: 30px;
            cursor: pointer;
            margin-right: 10px;
        }

        /*profile*/
        #user-profile {
            margin-right: 0;
        }

        #user-profile img {
            width: 30px;
            height: 30px;
            cursor: pointer;
            border-radius: 50%;
            margin-right: 10px;
        }

        #user-profile a {
            color: #fff;
            text-decoration: none;
            display: flex;
        }

        #user-profile a p {
            display: flex;
            align-items: center;
            color: #fff;
        }


        /* Style the search box */
        .search {
            width: 30px;
            height: 30px;
        }

        #search-box {
            width: 300px;
            padding: 10px;
            border-radius: 5px;
            display: none;
            top: 20px;
        }

        #search-box input {
            width: 100%;
            padding: 5px;
            border: none;
            border-radius: 5px;
        }


        .search-box {
            position: relative;
            display: inline-block;
        }

        #searchResult {
            position: absolute;
            width: 280px;
            height: 270px;
            /* border: 1px solid #fff; */
            right: 0;
            top: 40px;
            right: 240px;
            z-index: 99999;
            overflow-y: auto;
            border-radius: 5px;
        }

        #searchResult ::-webkit-scrollbar {
            width: 5px;
            background: rgb(255, 255, 255, .3);
            border-radius: 5px;
            visibility: hidden;
        }

        #searchResult ::-webkit-scrollbar-thumb {
            width: 5px;
            background: rgb(255, 255, 255, .4);
            border-radius: 5px;
            visibility: hidden;
        }

        #searchResult :hover::-webkit-scrollbar {
            visibility: visible;
        }

        #searchResult :hover::-webkit-scrollbar-thumb {
            visibility: visible;
        }



        .card {
            display: flex;
            align-items: center;
            margin-top: 3px;
            margin-bottom: 5px;
            text-decoration: none;
            background-color: #fff;
        }

        .card img {
            height: 90px;
            width: 65px;
            margin-right: 20px;
            padding: 3px none;
        }

        .card .container {
            display: flex;
            flex-direction: column;
        }

        .card h3 {
            margin: 0;
            font-size: 1.2rem;
            color: black;
            text-decoration: none;
        }

        .card p {
            margin: 5px 0 0 0;
            color: #555;
        }
    </style>
    <script>
        function toggleSearchBox() {
            var searchBox = document.getElementById('search-box');
            if (searchBox.style.display === 'none') {
                searchBox.style.display = 'block';
            } else {
                searchBox.style.display = 'none';
            }
        }

        function searchFunction() {
            var input = document.getElementById('searchBox').value;
            var searchResult = document.getElementById('searchResult');
            // Replace the URL with your PHP file handling the search logic
            var url = 'search.php?search=' + input;
            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        searchResult.innerHTML = xhr.responseText;
                    } else {
                        console.log('Error: ' + xhr.status);
                    }
                }
            };

            xhr.open('GET', url, true);
            xhr.send();
        }
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/component/apple.png" type="image/x-icon">
    <title>Apple Store</title>
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <img src="img/component/apple.png" alt="Logo">
            </div>
            <ul class="menu">
                <li><a href="catagory.php?catid=3">Mac</a></li>
                <li><a href="iPad.html"> iPad</a></li>
                <li><a href="iphone.php">iPhone</a></li>
                <li><a href="watch.html"> Watch</a></li>
                <li><a href="vision.html">Vision</a></li>
                <li><a href="airpods.html">Airpods</a></li>
            </ul>
            <div class="utility">

                <div id="search-box">
                    <input type="text" id="searchBox" placeholder="Search..." onkeyup="searchFunction()">
                    <div id="searchResult"></div>
                </div>
                <img onclick="toggleSearchBox()" class="search" src="img/component/search.png" alt="">

                <img src="img/component/shopping-cart.png" alt="Cart Icon" class="cart-icon">
                <div id="user-profile">
                    <a href="<?php
                                if (isset($_SESSION["user_id"])) {
                                    echo 'user/dashboard.php';
                                } else {
                                    echo 'login.php';
                                }
                                ?>">
                        <img src="<?php
                                    if (isset($_SESSION["user_id"])) {
                                        echo 'user/' . $details['img'];
                                    } else {
                                        echo "img/component/avatar.png";
                                    }
                                    ?>" alt="Profile" class="profile">
                        <p><?php if (isset($_SESSION["user_id"])) {
                                echo $details['first_name'];
                            } else {
                                echo "Login";
                            }
                            ?>
                        </p>
                    </a>
                </div>

            </div>

        </nav>
    </header>
</body>

</html>