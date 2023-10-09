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
    background-color: #333;
    color: #fff;
    position: fixed;
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

/* Style the search box */
.search-box {
    display: flex;
    align-items: center;
    background-color: #fff;
    border-radius: 5px;
    padding: 5px;
    margin-right: 60px;
}

.search-box input[type="text"] {
    border: none;
    outline: none;
    width: 100px;
    padding: 5px;
}

.search-box img {
    width: 20px;
    height: 20px;
    margin-left: 5px;
}
.cart-icon {
    width: 30px;
    height: 30px;
    cursor: pointer;
}
.profile{
    width: 30px;
    height: 30px;
    cursor: pointer;
}

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="component/image/apple.png" type="image/x-icon">
    <title>Apple Store</title>
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <img src="img/component/image/apple.png" alt="Logo">
            </div>
            <ul class="menu">
                <li><a href="mac.html">Mac</a></li>
                <li><a href="ipad.html"> iPad</a></li>
                <li><a href="iphone.html">iPhone</a></li>
                <li><a href="watch.html"> Watch</a></li>
                <li><a href="vision.html">Vision</a></li>
                <li><a href="airpods.html">Airpods</a></li>
            </ul>

            <div class="utility">
                <div class="search-box">
                    <input type="text" placeholder="Search">
                    <img src="img/component/image/search.svg" alt="Search Icon">
                </div>
                <img src="img/component/image/shopping-cart.svg" alt="Cart Icon" class="cart-icon">
                <a href="login.php"><img src="img/component/image/proile1.svg" alt="Profile" class="profile"></a>
            </div>
        </nav>
    </header>
</body>

</html>