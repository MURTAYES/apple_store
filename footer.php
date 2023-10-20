<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .section-container {
            display: flex;
            height: 40vh;
            background-color: #e6e6e6;
        }

        .section {
            flex: 1;
            padding: 20px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            padding: 5px 0;
        }

        li a {
            text-decoration: none;
            color: #000;
        }

        .copyright {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .copyright a {
            margin-left: 10px;
            color: #000;
        }

        hr {
            margin: 10px 0;
            border: none;
            border-top: 1px solid #ccc;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <footer>
        <hr>
        <div class="section-container">
            <div class="section about-us">
                <h2>About Us</h2>
                <p>Include a brief description of your company or organization here.</p>
            </div>
            <div class="section product-names">
                <h2>Our Products</h2>
                <ul>
                    <li><a href="#">Store</a></li>
                    <li><a href="#">Mac</a></li>
                    <li><a href="#">iPad</a></li>
                    <li><a href="#">iPhone</a></li>
                    <li><a href="#">Watch</a></li>
                    <li><a href="#">Vision</a></li>
                    <li><a href="#">AirPods</a></li>
                </ul>
            </div>
            <div class="section contact-us">
                <h2>Contact Us</h2>
                <p>Email: example@example.com</p>
                <p>Phone: 123-456-7890</p>
            </div>
        </div>
        <hr>
        <div class="copyright">
            &copy; 2023 Your Company Name
            <a href="t&c.php">Terms and Conditions</a>
        </div>
    </footer>
</body>

</html>
