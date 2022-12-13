<?php
include('koneksi.php');
$pendapatanNorthwest = mysqli_query($conn, "SELECT SUM(LineTotal) FROM fact_sales WHERE `TerritoryID` = 1");
$pendapatanNortheast = mysqli_query($conn, "SELECT SUM(LineTotal) FROM fact_sales WHERE `TerritoryID` = 2");
$pendapatanCentral = mysqli_query($conn, "SELECT SUM(LineTotal) FROM fact_sales WHERE `TerritoryID` = 3");
$pendapatanSouthwest = mysqli_query($conn, "SELECT SUM(LineTotal) FROM fact_sales WHERE `TerritoryID` = 4");
$pendapatanSoutheast = mysqli_query($conn, "SELECT SUM(LineTotal) FROM fact_sales WHERE `TerritoryID` = 5");
$pendapatanCanada = mysqli_query($conn, "SELECT SUM(LineTotal) FROM fact_sales WHERE `TerritoryID` = 6");
$territory = mysqli_query($conn, "SELECT Name FROM salesterritory WHERE `TerritoryID` < 6");

?>
<DOCTYPE HTML>
    <html>

    <head>
        <title> Pendapatan Benua Amerika</title>
        <script type="text/javascript" src="Chart.js"></script>
    </head>

    <body>
        <div style="width : 800px; height:800px">
            <canvas id="myChart"></canvas>
        </div>
        <h1>halo</h1>

        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($territory); ?>,
                    datasets: [{
                            label: 'Total Kasus',
                            data: <?php echo json_encode($pendapatanNorthwest); ?>,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Kasus Baru',
                            data: <?php echo json_encode($pendapatanNortheast); ?>,
                            backgroundColor: 'rgb(46, 139, 87, 0.2)',
                            borderColor: 'rgb(46, 139, 87, 1)',
                            borderWidth: 1
                        },

                        {
                            label: 'Jumlah Kematian',
                            data: <?php echo json_encode($pendapatanCentral); ?>,
                            backgroundColor: 'rgb(66, 245, 72, 0.2)',
                            borderColor: 'rgb(66, 245, 72, 1)',
                            borderWidth: 1
                        },

                        {
                            label: 'Kematian Baru',
                            data: <?php echo json_encode($pendapatanSouthwest); ?>,
                            backgroundColor: 'rgb(245, 227, 66, 0.2)',
                            borderColor: 'rgb(245, 227, 66, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Total Kesembuhan',
                            data: <?php echo json_encode($pendapatanSoutheast); ?>,
                            backgroundColor: 'rgb(233, 66, 245, 0.2)',
                            borderColor: 'rgb(233, 66, 245, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Sembuh Baru',
                            data: <?php echo json_encode($pendapatanCanada); ?>,
                            backgroundColor: 'rgb(66, 75, 245 0.2)',
                            borderColor: 'rgb(66, 75, 245, 1)',
                            borderWidth: 1
                        },
                    ]
                },

                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
    </body>

    </html>