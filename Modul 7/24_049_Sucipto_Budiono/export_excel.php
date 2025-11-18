<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Laporan-Penjualan.xls");

include "data.php";

$start = $_GET['start'] ?? "2025-09-01"; 
$end   = $_GET['end'] ?? "2025-09-27";
$filtered = get_filtered_data($start, $end, $koneksi); 

$total_pelanggan  = count($filtered);
$total_pendapatan = array_sum(array_column($filtered, "total"));

echo "<h2>Rekap Laporan Penjualan $start sampai $end</h2>";

echo "<table border='1'>";
echo "<tr><th>No</th><th>Total</th><th>Tanggal</th></tr>";

$no=1;
foreach ($filtered as $row) {
    echo "<tr>
            <td>{$no}</td>
            <td>{$row['total']}</td>
            <td>{$row['tanggal']}</td>
        </tr>";
    $no++;
}
echo "</table><br>";

echo "<table border='1'>";
echo "<tr><td colspan='2'><b>TOTAL</b></td></tr>";
echo "<tr><td>Jumlah Pelanggan</td><td>$total_pelanggan</td></tr>";
echo "<tr><td>Jumlah Pendapatan</td><td>$total_pendapatan</td></tr>";
echo "</table>";
?>