<?php
include 'koneksi.php';

function get_filtered_data($start_date, $end_date, $koneksi) {

    $sql = "SELECT tanggal, total FROM penjualan WHERE tanggal BETWEEN ? AND ? ORDER BY tanggal ASC";
    
    $stmt = mysqli_prepare($koneksi, $sql);
    
    if (!$stmt) {
        die("Gagal mempersiapkan statement: " . mysqli_error($koneksi));
    }

    mysqli_stmt_bind_param($stmt, "ss", $start_date, $end_date);
    
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    
    $filtered = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $row['total'] = (float) $row['total'];
            $filtered[] = $row;
        }
        mysqli_free_result($result);
    }
    
    mysqli_stmt_close($stmt);
    
    return $filtered;
}
?>