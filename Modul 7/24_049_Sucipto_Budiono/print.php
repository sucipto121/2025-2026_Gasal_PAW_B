<?php
include "data.php"; 

$start = $_GET['start'];
$end   = $_GET['end'];

$filtered = get_filtered_data($start, $end, $koneksi); 

$values = array_column($filtered, "total");
$labels = array_column($filtered, "tanggal");

$total_pelanggan  = count($filtered);
$total_pendapatan = array_sum($values);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Print Laporan</title>
    <link rel="stylesheet" href="style.css"> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>

        @media print {
            
            .chart-area, .table-style {
                width: 95% !important; 
                margin: 0 auto 20px 0; /
            }
            
            .chart-area canvas {
                 max-height: 350px !important; 
            }

            .table-total {
                width: 50% !important; 
                margin: 10px 0 20px 0; 
                page-break-inside: avoid; 
            }
            
            .table-style th, .table-style td {
                text-align: left; 
            }
            .table-style td:first-child {
                text-align: center; 
            }
            .table-style td:nth-child(2) {
                text-align: right;
            }
            
            h2 { 
                text-align: center; /
            }
            h3 { 
                page-break-after: avoid; 
                margin-top: 20px;
            }
        }
    </style>
</head>
<body onload="window.print()">

<h2>Rekap Laporan Penjualan <?= $start ?> sampai <?= $end ?></h2>

<?php if ($filtered): ?>
    
    <h3>Grafik Penjualan</h3>
    <div class="chart-area" style="width: 70%; height: 300px;">
        <canvas id="chart"></canvas>
    </div>

    <h3>Total Penjualan</h3>
    <table class="table-total">
        <tr>
            <td>Jumlah Pelanggan</td>
            <td><?= $total_pelanggan ?></td>
        </tr>
        <tr>
            <td>Jumlah Pendapatan</td>
            <td>Rp <?= number_format($total_pendapatan,0,',','.') ?></td>
        </tr>
    </table>
    
    <h3>Rekap Penjualan</h3>
    <table class="table-style">
        <thead>
        <tr><th>No</th><th>Total</th><th>Tanggal</th></tr>
        </thead>
        <tbody>
        <?php $no=1; foreach ($filtered as $row): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
            <td><?= $row['tanggal'] ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


    <script>
        new Chart(document.getElementById("chart"), {
            type: 'bar',
            data: {
                labels: <?= json_encode($labels) ?>,
                datasets: [{
                    label: "Total",
                    data: <?= json_encode($values) ?>,
                    backgroundColor: "#d3d3d3",
                    borderColor: "#888",
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
<?php endif; ?>

</body>
</html>