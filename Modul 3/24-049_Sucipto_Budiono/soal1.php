<?php
echo "<h3>1. Menambahkan 5 data baru</h3>";
$fruits = array("Avocado", "Blueberry", "Cherry");
echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . ".<br>";

array_push($fruits, "Durian", "nanas", "salak", "mangga", "rambutan");
echo "Data terakhir: " . ($fruits)[7]. "<br>"; 
echo "Indeks tertinggi: " . (count($fruits)-1). "<br>";

echo"<h3>2. Menghapus satu data</h3>";
unset($fruits[5]); 
echo "Data terakhir: " . ($fruits)[7] . "<br>";
echo "Indeks tertinggi: " . (count($fruits)-1). "<br>";

echo"<h3>3. Membuat data baru <br></h3>";
$vegies = array("Kangkung,", "Bayam,", "Buncis");
foreach ($vegies as $value) {
    echo "$value ";
}
?>