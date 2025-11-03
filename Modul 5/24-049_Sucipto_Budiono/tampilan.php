<?php
include "koneksi.php";

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM supplier WHERE id='$id'");
    echo "<script>alert('Data berhasil dihapus'); window.location='tampilan.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Master Supplier</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="text-primary mb-0">Data Master Supplier</h3>
    <a href="tambah.php" class="btn btn-success">Tambah Data</a>
  </div>

  <table class="table table-bordered table-striped text-center">
    <thead class="table-info">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Telp</th>
        <th>Alamat</th>
        <th>Tindakan</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = mysqli_query($conn, "SELECT * FROM supplier ORDER BY id ASC");
      $no = 1;
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['telp']; ?></td>
        <td><?= $row['alamat']; ?></td>
        <td>
          <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm text-white">Edit</a>
          <a href="tampilan.php?hapus=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus supplier ini?')">Hapus</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>
