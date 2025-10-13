<?php
echo "<h3>1. Menambahkan 5 data baru dengan menggunakkan for</h3>";
$fruits = array("Avocado", "Blueberry", "Cherry");
$fruits2 =array("Durian","Mango","Orange","Banana","Apple");
$arrlength = count($fruits2);

for($x = 0; $x < $arrlength; $x++) {
    echo $fruits2[$x];
    echo "<br>";
    array_push($fruits, $fruits2[$x]);
}
echo "Jumlah data sekarang: " . count($fruits). "<br>";

echo "<h3>2. Menambahkan 3  data baru dengan menggunakan perulangan for</h3>";
$vegies = array("Carrot", "Spinach", "Broccoli");
for($i=0;$i<count($vegies);$i++){
    echo $vegies[$i] . "<br>";
}

?>