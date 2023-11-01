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
    <link rel="stylesheet" href="css/header.css">
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
                <li><a href="mac.html">Mac</a></li>
                <li><a href="iPad.html"> iPad</a></li>
                <li><a href="iphone.php">iPhone</a></li>
                <li><a href="watch.html"> Watch</a></li>
                <li><a href="vision.html">Vision</a></li>
                <li><a href="airpods.html">Airpods</a></li>
            </ul>
            <div class="utility">

                <!-- search_bar -->
                <div id="search-box">
                    <input type="text" id="searchBox" placeholder="Search..." onkeyup="searchFunction()">
                    <div id="searchResult"></div>
                </div>
                <img onclick="toggleSearchBox()" class="search" src="img/component/search.png" alt="">

                <!-- cart -->
                <div class="dropdown">
                    <img src="img/component/shopping-cart.png" alt="Cart Icon" class="cart-icon" onclick="toggleCart()">
                    <div class="dropdown-content" id="cartDropdown">
                        <!-- Items will be added dynamically here using JavaScript -->
                    </div>
                </div>

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