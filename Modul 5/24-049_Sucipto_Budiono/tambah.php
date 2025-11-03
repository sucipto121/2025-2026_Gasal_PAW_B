<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Data Master Supplier Baru</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <h3 class="text-center text-primary mb-4">Tambah Data Master Supplier Baru</h3>

  <div class="card shadow p-4">
    <form action="" method="POST">
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Telp</label>
        <input type="text" name="telp" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Alamat</label>
        <input type="text" name="alamat" class="form-control" required>
      </div>
      <div class="text-end">
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="tampilan.php" class="btn btn-danger">Batal</a>
      </div>
    </form>
  </div>
</div>

</body>
</html>

<?php
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data berhasil disimpan'); window.location='tampilan.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data: " . mysqli_error($conn) . "');</script>";
    }
}
?>
