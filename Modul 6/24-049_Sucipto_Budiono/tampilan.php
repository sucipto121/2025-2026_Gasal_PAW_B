<?php
include 'koneksi.php';
if (isset($_GET['hapus'])) {
    $id_nota = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM item_nota WHERE id_nota='$id_nota'");
    mysqli_query($conn, "DELETE FROM nota WHERE id_nota='$id_nota'");
    header("Location: tampilan.php");
    exit;
}

$pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
$barang = mysqli_query($conn, "SELECT * FROM barang");

$query_transaksi = "
SELECT 
    n.id_nota,
    n.tanggal,
    p.nama AS pelanggan,
    b.nama_barang,
    i.qty,
    i.harga_satuan,
    (i.qty * i.harga_satuan) AS subtotal,
    n.total
FROM nota n
JOIN pelanggan p ON n.pelanggan_id = p.id
JOIN item_nota i ON n.id_nota = i.id_nota
JOIN barang b ON i.id_barang = b.kode_barang
ORDER BY n.id_nota DESC;
";
$result_transaksi = mysqli_query($conn, $query_transaksi);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Transaksi Penjualan </title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
  <h2 class="text-center mb-4">Transaksi Penjualan</h2>

  <div class="card shadow-sm mb-4">
    <div class="card-header bg-success text-white">
      <strong>Tambah Transaksi</strong>
    </div>
    <div class="card-body">
      <form action="simpan.php" method="post">
        <div class="mb-3">
          <label class="form-label">Tanggal</label>
          <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Pelanggan</label>
          <select name="pelanggan_id" class="form-select" required>
            <option value="">-- Pilih Pelanggan --</option>
            <?php while ($p = mysqli_fetch_assoc($pelanggan)) { ?>
              <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
            <?php } ?>
          </select>
        </div>

        <h6 class="mt-4">Detail Barang</h6>
        <div class="mb-3">
          <label class="form-label">Barang</label>
          <select name="id_barang[]" id="barangSelect" class="form-select" required>
            <option value="">-- Pilih Barang --</option>
            <?php 
            mysqli_data_seek($barang, 0);
            while ($b = mysqli_fetch_assoc($barang)) { ?>
              <option value="<?= $b['kode_barang'] ?>" data-stok="<?= $b['stok'] ?>">
                <?= $b['nama_barang'] ?> (Stok: <?= $b['stok'] ?>)
              </option>
            <?php } ?>
          </select>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">Qty</label>
            <input type="number" id="qtyInput" name="qty[]" class="form-control" min="1" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Harga Satuan</label>
            <input type="number" name="harga_satuan[]" class="form-control" step="0.01" required>
          </div>
        </div>

        <div class="text-end">
          <button type="submit" class="btn btn-success">Simpan Transaksi</button>
        </div>
      </form>

      <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger mt-3">
              <?= htmlspecialchars($_GET['error']) ?>
          </div>
      <?php } elseif (isset($_GET['success'])) { ?>
          <div class="alert alert-success mt-3">
              <?= htmlspecialchars($_GET['success']) ?>
          </div>
      <?php } ?>
    </div>
  </div>

  <div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
      <strong>Daftar Transaksi</strong>
    </div>
    <div class="card-body">
    <?php
    $no = 1;
    $current_nota = null;
    while ($row = mysqli_fetch_assoc($result_transaksi)) {
        if ($current_nota != $row['id_nota']) {
            if ($current_nota !== null) {
                echo "</tbody></table>";
                echo "<p class='text-end fw-bold'>Total: Rp " . number_format($total_nota, 0, ',', '.') . "</p></div>";
            }

            $total_nota = $row['total'];
            echo "<div class='border rounded p-3 mb-3 bg-white'>";
            echo "<div class='d-flex justify-content-between align-items-center mb-2'>";
            echo "<h6 class='mb-0'>Nota " . $no++ . " - {$row['pelanggan']} ({$row['tanggal']})</h6>";
            echo "<a href='?hapus={$row['id_nota']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus transaksi ini?\")'>Hapus</a>";
            echo "</div>";
            echo "<table class='table table-sm table-bordered align-middle mb-0'>";
            echo "<thead class='table-light'><tr><th>Barang</th><th>Qty</th><th>Harga</th><th>Subtotal</th></tr></thead><tbody>";
            $current_nota = $row['id_nota'];
        }

        echo "<tr>
                <td>{$row['nama_barang']}</td>
                <td>{$row['qty']}</td>
                <td>Rp " . number_format($row['harga_satuan'], 0, ',', '.') . "</td>
                <td>Rp " . number_format($row['subtotal'], 0, ',', '.') . "</td>
              </tr>";
    }

    if ($current_nota !== null) {
        echo "</tbody></table>";
        echo "<p class='text-end fw-bold'>Total: Rp " . number_format($total_nota, 0, ',', '.') . "</p></div>";
    }
    ?>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
const barangSelect = document.getElementById('barangSelect');
const qtyInput = document.getElementById('qtyInput');

barangSelect.addEventListener('change', () => {
  const stok = barangSelect.options[barangSelect.selectedIndex].dataset.stok;
  qtyInput.max = stok;
  qtyInput.placeholder = "Maks: " + stok;
});

qtyInput.addEventListener('input', () => {
  const stok = barangSelect.options[barangSelect.selectedIndex].dataset.stok;
  if (parseInt(qtyInput.value) > parseInt(stok)) {
    qtyInput.value = stok;
    alert("Qty melebihi stok! Maksimal: " + stok);
  }
});
</script>
</body>
</html>
