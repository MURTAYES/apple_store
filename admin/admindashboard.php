<?php
include('sidebar.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .dashboard-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #content {
            margin-left: 220px;
            padding: 20px;
        }

        .graph-container {
            width: 50%;
            min-width: 300px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div id="content">
        <div class="dashboard-container">
            <div class="graph-container">
                <canvas id="myChart" width="400" height="400"></canvas>
            </div>
        </div>

        <?php

        // Assuming you have established a database connection
        $sql = "SELECT o.order_id, oi.quantity,p.rice
                FROM orders o
                JOIN order_items oi ON o.order_id = oi.order_id
                JOIN products p ON oi.product_id = p.product_id";
        // Query for total sales of the month
        $totalSalesQuery = "SELECT SUM(total_amount) AS total_sales FROM orders WHERE MONTH(order_date) = MONTH(CURRENT_DATE())";
        $totalSalesResult = mysqli_query($connection, $totalSalesQuery);
        $totalSalesData = mysqli_fetch_assoc($totalSalesResult);
        $totalSales = $totalSalesData['total_sales'];

        // Query for total users added this month
        $totalUsersQuery = "SELECT COUNT(*) AS total_users FROM users WHERE MONTH(registration_date) = MONTH(CURRENT_DATE())";
        $totalUsersResult = mysqli_query($connection, $totalUsersQuery);
        $totalUsersData = mysqli_fetch_assoc($totalUsersResult);
        $totalUsers = $totalUsersData['total_users'];

        // Display the results in your admin dashboard
        echo "Total Sales of the Month: $" . $totalSales . "<br>";
        echo "Total Users Added this Month: " . $totalUsers;

        ?>

        <script>
            const totalSales = <?php echo $totalSales; ?>;
            const totalUsers = <?php echo $totalUsers; ?>;

            const ctx = document.getElementById('myChart').getContext('2d');

            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Total Sales', 'Total Users'],
                    datasets: [{
                        label: 'Monthly Data',
                        data: [totalSales, totalUsers],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </div>

</body>

</html>