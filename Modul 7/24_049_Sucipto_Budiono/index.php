<?php
include "data.php"; 

$start = $_GET['start'] ?? "2025-09-01";
$end   = $_GET['end'] ?? "2025-09-27";

$filtered = [];
$is_valid_range = true;
if ($start > $end) {
    $is_valid_range = false;
} 
if ($is_valid_range) {
    $filtered = get_filtered_data($start, $end, $koneksi); 
}
$labels = array_column($filtered, "tanggal");
$values = array_column($filtered, "total");

$total_pelanggan  = count($filtered);
$total_pendapatan = array_sum($values);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Rekap Laporan Penjualan</title>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="style.css">
</head>

<body>

<h3>Filter tanggal</h3>

<form method="GET" class="filter-box">
    <input type="date" name="start" value="<?= $start ?>">
    <input type="date" name="end" value="<?= $end ?>">
    <button class="btn-green">Tampilkan</button>
</form>

<?php 
if (!$is_valid_range): 
?>
    <div style="color: red; padding: 10px; border: 1px solid red; margin-bottom: 20px;">
        **Kesalahan Input:** Tanggal mulai harus lebih kecil atau sama dengan tanggal akhir.
    </div>
<?php endif; ?>

<?php if ($is_valid_range && $filtered): ?>

<h3>Hasil Pencarian Diagram</h3>

<div class="chart-area">
    <canvas id="chart"></canvas>
</div>

<h3>Rekap Penjualan</h3>

<table class="table-style">
<thead>
<tr>
    <th>No</th>
    <th>Total</th>
    <th>Tanggal</th>
</tr>
</thead>

<tbody>
<?php $no=1; foreach($filtered as $row): ?>
<tr>
    <td><?= $no++ ?></td>
    <td>Rp <?= number_format($row['total'],0,',','.') ?></td>
    <td><?= date("d M Y", strtotime($row['tanggal'])) ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

<h3>Total</h3>

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

<div class="btn-container">
    <a href="print.php?start=<?= $start ?>&end=<?= $end ?>" class="btn-orange">Cetak</a>
    <a href="export_excel.php?start=<?= $start ?>&end=<?= $end ?>" class="btn-orange">Excel</a>
</div>

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