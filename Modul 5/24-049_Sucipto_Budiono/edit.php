<?php
include "koneksi.php";

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM supplier WHERE id='$id'");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Data Master Supplier</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <h3 class="text-center text-primary mb-4">Edit Data Master Supplier</h3>

  <div class="card shadow p-4">
    <form action="" method="POST">
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Telp</label>
        <input type="text" name="telp" class="form-control" value="<?php echo $data['telp']; ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Alamat</label>
        <input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" required>
      </div>
      <div class="text-end">
        <button type="submit" name="update" class="btn btn-warning text-white">Update</button>
        <a href="tampilan.php" class="btn btn-danger">Batal</a>
      </div>
    </form>
  </div>
</div>

</body>
</html>

<?php
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $update = mysqli_query($conn, "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id='$id'");

    if ($update) {
        echo "<script>alert('Data berhasil diupdate'); window.location='tampilan.php';</script>";
    } else {
        echo "<script>alert('Gagal update data');</script>";
    }
}
?>
