<?php
include('sidebar.php');

$sql = "SELECT p.product_id, p.name, oi.quantity as delivered_quantity
        FROM products p
        JOIN order_items oi ON p.product_id = oi.product_id
        JOIN orders o ON oi.order_id = o.order_id
        WHERE o.order_status = 'Delivered';";

$result = mysqli_query($conn, $sql);

$months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
$userCountPerMonth = array();

for ($i = 0; $i <= 11; $i++) {
    $query = "SELECT COUNT(*) AS user_count FROM users WHERE MONTH(registration_date) = " . ($i + 1);
    $res = mysqli_query($conn, $query);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $userCountPerMonth[] = $row['user_count'];
    } else {
        $userCountPerMonth[] = 0;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            // Draw PieChart
            var dataPie = google.visualization.arrayToDataTable([
                ['Product Name', 'Quantity Delivered'],
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "['" . $row['name'] . "'," . $row['delivered_quantity'] . "],";
                }
                ?>
            ]);

            var optionsPie = {
                title: 'Products Sold',
                is3D: true
            };

            var chartPie = new google.visualization.PieChart(document.getElementById('piechart'));
            chartPie.draw(dataPie, optionsPie);

            // Draw BarChart
            google.charts.load('current', {
                packages: ['corechart', 'line']
            });
            google.charts.setOnLoadCallback(drawCurveTypes);

            function drawCurveTypes() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Month');
                data.addColumn('number', 'User Count');

                var monthNames = <?php echo json_encode($months); ?>;
                var userCounts = <?php echo json_encode($userCountPerMonth); ?>;

                data.addRows([
                    <?php for ($i = 0; $i < count($months); $i++) {
                        echo "['" . $months[$i] . "', " . $userCountPerMonth[$i] . "],";
                    } ?>
                ]);


                var options = {
                    hAxis: {
                        title: 'Month'
                    },
                    vAxis: {
                        title: 'User'
                    },
                    series: {
                        1: {
                            curveType: 'function'
                        }
                    }
                };

                var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        }
    </script>

    <style>
        #content {
            margin-left: 220px;
            padding: 20px;
        }

        .vertical-section {
            width: 50%;
            float: left;
        }
    </style>
</head>

<body>
    <div id="content">
        <div class="vertical-section">
            <div id="piechart"></div>
        </div>
        <div class="vertical-section">
            <div id="chart_div"></div>
        </div>
    </div>
</body>

</html>
