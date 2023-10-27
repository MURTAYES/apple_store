<?php
include('sidebar.php');
$sql = "SELECT p.product_id, p.name, oi.quantity as delivered_quantity
           FROM products p
           JOIN order_items oi ON p.product_id = oi.product_id
           JOIN orders o ON oi.order_id = o.order_id
           WHERE o.order_status = 'Delivered';";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Product Name', 'Quantity Delivered'],
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "['" . $row['name'] . "'," . $row['delivered_quantity'] . "],";
                }
                ?>
            ]);

            var options = {
                title: 'Products Sold',
                is3D: true
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }

        /* sales by month*/
        document.getElementById('monthsDropdown').addEventListener('change', function() {
            var selectedMonth = this.value;

            // Perform an AJAX request
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Display the result in some HTML element
                    document.getElementById("result").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "sales.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("selectedMonth=" + selectedMonth);
        });
    </script>
    <style>
        #content {
            margin-left: 220px;
            padding: 20px;
        }

        .vertical-section {
            width: 50%;
        }
    </style>
</head>

<body>
    <div id="content">
        <div class="vertical-section">
            <div id="piechart"></div>
        </div>
        <div class="vertical-section">
            <select id="monthsDropdown">
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>

            <div id="chart2"></div>
        </div>

    </div>

</body>

</html>