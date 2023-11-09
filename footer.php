<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        footer {
            background-color: #f9f9f9;
            padding: 20px 0;
        }

        .section-container {
            display: flex;
            justify-content: space-around;
            padding: 20px;
        }

        .section {
            flex: 1;
            padding: 0 20px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #333;
        }

        p {
            color: #555;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            padding: 8px 0;
        }

        li a {
            text-decoration: none;
            color: #333;
        }

        hr {
            margin: 30px 0;
            border: none;
            border-top: 1px solid #ddd;
        }

        .footer-content {
            text-align: center;
            color: #777;
            padding: 20px;
        }

        .footer-content a {
            color: #777;
            text-decoration: none;
            margin-left: 15px;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Website</title>
</head>

<body>
    <footer>
        <hr>
        <div class="section-container">
            <div class="section about-us">
                <h2>About Us</h2>
                <p>Welcome to our online store,
                    the result of a collaborative effort by a team of passionate students from
                    North South University.
                    Our mission is to bring you a seamless and enjoyable shopping experience.
                </p>
            </div>
            <div class="section product-names">
                <h2>Our Products</h2>
                <ul>
                    <li><a href="mac.html">Mac</a></li>
                    <li><a href="iPad.html"> iPad</a></li>
                    <li><a href="iphone.php">iPhone</a></li>
                    <li><a href="watch.html"> Watch</a></li>
                    <li><a href="vision.html">Vision</a></li>
                    <li><a href="airpods.html">Airpods</a></li>
                </ul>
            </div>
            <div class="section contact-us">
                <h2>Contact Us</h2>
                <p>Email: support@example.com</p>
                <p>Phone: 123-456-7890</p>
            </div>
        </div>
        <hr>
        <div class="footer-content">
            &copy; 2023 Team apple_store. All rights reserved.
            <a href="t&c.php">Terms and Conditions</a>
        </div>
    </footer>
</body>

</html>