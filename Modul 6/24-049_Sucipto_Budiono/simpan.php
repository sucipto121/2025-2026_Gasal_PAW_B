<?php
include 'koneksi.php';

$tanggal = $_POST['tanggal'];
$pelanggan_id = $_POST['pelanggan_id'];
$id_barang = $_POST['id_barang'];
$qty = $_POST['qty'];
$harga_satuan = $_POST['harga_satuan'];

$error = "";
$total = 0;

for ($i = 0; $i < count($id_barang); $i++) {
    if (!empty($id_barang[$i])) {
        $barang = $id_barang[$i];
        $jumlah = (int)$qty[$i];
        $harga = (float)$harga_satuan[$i];

        $cek = mysqli_query($conn, "SELECT stok, nama_barang FROM barang WHERE kode_barang='$barang'");
        $data_barang = mysqli_fetch_assoc($cek);

        if (!$data_barang) {
            $error = "Barang dengan kode $barang tidak ditemukan!";
            break;
        }

        $stok_tersedia = (int)$data_barang['stok'];
        $nama_barang = $data_barang['nama_barang'];

        if ($jumlah > $stok_tersedia) {
            $error = "Stok barang '$nama_barang' tidak mencukupi! (tersedia: $stok_tersedia, diminta: $jumlah)";
            break;
        }

        $subtotal = $jumlah * $harga;
        $total += $subtotal;
    }
}

if ($error != "") {
    header("Location: tampilan.php?error=" . urlencode($error));
    exit;
}

mysqli_query($conn, "INSERT INTO nota (tanggal, pelanggan_id, total) VALUES ('$tanggal', '$pelanggan_id', '$total')");
$id_nota = mysqli_insert_id($conn);

for ($i = 0; $i < count($id_barang); $i++) {
    if (!empty($id_barang[$i])) {
        $barang = $id_barang[$i];
        $jumlah = (int)$qty[$i];
        $harga = (float)$harga_satuan[$i];

        mysqli_query($conn, "UPDATE barang SET stok = stok - $jumlah WHERE kode_barang='$barang'");
        mysqli_query($conn, "INSERT INTO item_nota (id_nota, id_barang, qty, harga_satuan)
                             VALUES ('$id_nota', '$barang', '$jumlah', '$harga')");
    }
}
header("Location: tampilan.php?success=" . urlencode("Transaksi berhasil disimpan!"));
exit;
?>
