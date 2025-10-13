<?php
echo "<h3>1. Menambahkan array height</h3>";

$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");

$height["Doni"] = "166";
$height["Eka"] = "168";
$height["Fajar"] = "172";
$height["Gita"] = "160";
$height["Hendra"] = "175";
echo "Indeks terakhir adalah Hendra dengan tinggi: " . end($height) . " cm";

echo"<h3>2. Menghapus satu data</h3>";

unset($height["Gita"]);
echo "Setelah dihapus, indeks terakhir adalah Hendra dengan tinggi: " . end($height) . " cm";

echo"<h3> 3. Membuat array baru weight</h3>";

$weight = array("Andy"=>70, "Barry"=>65, "Charlie"=>68);
$keys = array_keys($weight);
if (isset($keys[1])) {
    $k = $keys[1];
    echo "Data kedua dari \$weight adalah " . $k . " => " . $weight[$k] . " kg\n";
} else {
    echo "Tidak ada elemen kedua pada \$weight.\n";
}

?>