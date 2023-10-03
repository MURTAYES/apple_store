<?php
include('sidebar.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../component/image/apple(1).png" type="image/x-icon">
    <title>Add product</title>
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

        .custom_upload_button,
        button {
            background-color: #333;
            color: #fff;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            margin-left: 20px;
        }

        /* Style the input field to be hidden */
        input[type="file"] {
            display: none;
        }
    </style>
</head>

<body>
    <div class="content">
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="title">
                <h2>Add product</h2>
            </div>
            <div class="form">
                <div class="input_field">
                    <label for="customImageUpload" class="custom_upload_button">Upload Image</label>
                    <input type="file" id="customImageUpload" name="image" style="display: none;">
                </div>
                <div class="input_field">
                    <label>Catagory</label>
                    <select name="catagory" required>
                        <option disabled selected>Select an option</option>
                        <option>Iphone</option>
                        <option>Ipad</option>
                        <option>Mac</option>
                        <option>Watch</option>
                        <option>Vision</option>
                        <option>Airpod</option>
                    </select>
                </div>
                <div class="input_field">
                    <label>Product Name</label>
                    <input type="text" class="input" name="pname" required>
                </div>
                <div class="input_field">
                    <label>Price</label>
                    <input type="text" class="input" name="price" required>
                </div>
                <div class="input_field">
                    <label>Quantity</label>
                    <input type="text" class="input" name="quan" required>
                </div>
                <div class="input_field">
                    <label>Colour</label>
                    <input type="text" class="input" name="col" required>
                </div>
                <div class="input_field">
                    <input type="submit" value="Add product" class="btn" name="add">
                </div>
            </div>
        </form>

        <?php

        if (isset($_POST['add'])) {
            $category = $_POST["catagory"];
            $pname = $_POST["pname"];
            $price = $_POST['price'];
            $quan = $_POST['quan'];
            $col = $_POST['col'];

            // Check if the category exists in the "categories" table
            $checkCategory = "SELECT category_id FROM categories WHERE name = '$category'";
            $categoryResult = mysqli_query($conn, $checkCategory);

            if ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
                // Category exists, retrieve its category_id
                $category_id = $categoryRow['category_id'];

                // Upload the image
                $targetDirectory = 'product/';
                $imageFileName = $_FILES['image']['name'];
                $targetPath = $targetDirectory . $imageFileName;

                // Check if the file is an image and move it to the target directory
                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {

                    // Inserting data into the "products" table with the image path
                    $sql = "INSERT INTO products (name, img, price, colour, quantity, category_id)
                    VALUES ('$pname', '$targetPath', '$price', '$col', '$quan', '$category_id')";

                    if ($conn->query($sql) === TRUE) {
                        echo "Product added successfully.";
                    } else {
                        echo "Error: " . $conn->error;
                    }
                } else {
                    // Image upload failed, handle this case (e.g., display an error message)
                    echo "Image upload failed. Please try again.";
                }
            } else {
                // Category does not exist, handle this case (e.g., display an error message)
                echo "Invalid category name. Please choose a valid category.";
            }
        }
        // Close the database connection
        $conn->close();
        ?>

    </div>
</body>

</html>