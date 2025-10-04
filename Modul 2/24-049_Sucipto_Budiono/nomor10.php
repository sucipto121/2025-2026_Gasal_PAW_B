<?php
$menu = [
    1 => ["nama" => "Nasi Goreng", "harga" => 15000],
    2 => ["nama" => "Mie Ayam",    "harga" => 12000],
    3 => ["nama" => "Es Teh",      "harga" => 5000],
    4 => ["nama" => "Kopi",        "harga" => 8000],
];

echo "==============================<br>";
echo "        DAFTAR MENU           <br>";
echo "==============================<br>";
foreach ($menu as $key => $item) {
    echo "$key. {$item['nama']} - Rp{$item['harga']}<br>";
}
echo "==============================<br><br>";

$total = 0;

for ($i = 1; $i <= 2; $i++) {
    $pilihan = $i;   
    $jumlah  = $i;  

    if (isset($menu[$pilihan])) {
        $nama = $menu[$pilihan]['nama'];
        $harga = $menu[$pilihan]['harga'];
        $subtotal = $harga * $jumlah;
        $total = $subtotal + $total;

        echo "Pembelian $i: $nama x $jumlah = Rp$subtotal <br>";
    }
}

echo "<br>==============================<br>";
echo "Total Belanja: Rp$total<br>";
echo "==============================<br>";
?>
