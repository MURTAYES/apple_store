<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        section {
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        /*section1*/
        #section1 {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            height: 100vh;
            background-image: url('img/component/15.png');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .text-container1 {
            position: absolute;
            text-align: center;
            margin: 80px auto;
        }

        .text-container1 h1 {
            font-size: 50px;
        }

        .text-container1 p {
            font-size: 25px;
            padding-top: 10px;
        }

        /*section2*/
        #section2 {
            background-image: url('img/component/air.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        /*section3*/
        #section3 {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            height: 100vh;
            background-image: url('img/component/watch.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .text-container3 {
            position: absolute;
            text-align: center;
            margin-top: 20px;
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
        }

        .text-container3 h2 {
            font-size: 20px;
            font-weight: bold;
            color: #B71515;
            letter-spacing: 3px;
        }

        .text-container3 p {
            font-size: 25px;
            padding-top: 10px;
        }


        .button {
            padding: 10px 20px;
            background-color: #2381DB;
            color: #fff;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            margin-top: 10px;
        }

        .button:hover {
            background-color: #555;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/component/apple.png" type="image/x-icon">
    <title>Apple Store</title>
</head>
<?php include 'header.php'; ?>
<section id="section1">
    <div class="text-container1">
        <h1>iphone 15 pro</h1>
        <p>Titanium.So strong.So light.So pro</p>
        <a href="">
            <button class="button">Buy Now</button>
        </a>
    </div>
</section>
<section id="section2">
    <div class="text-container">
        <img src="path_to_your_image2.jpg" alt="Image 2" style="width: 50%;">
    </div>
</section>
<section id="section3">
    <div class="text-container3">
        <img src="img/component/apple.png" alt="">
        <h1>WATCH</h1>
        <h2>SERIES 9</h2>
        <p>Smarter.Brighter.Mighter</p>
        <button class="button">Buy</button>
    </div>
</section>

<body>

</body>
<?php include 'footer.php'; ?>

</html>