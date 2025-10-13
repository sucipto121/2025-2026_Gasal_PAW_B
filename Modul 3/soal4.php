<?php
echo "<h3>1. Menambahkan 5 data baru dengan menggunakan perulangan foreach</h3>";
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");

$height["Doni"] = "180";
$height["Eka"] = "168";
$height["Fajar"] = "172";
$height["Gita"] = "160";
$height["Hendra"] = "175";

echo "<h4>Data Array height:</h4>";
foreach ($height as $x => $x_value) {
    echo "Key = " . $x . ", Value = " . $x_value . " cm<br>";
}

echo "<h3>2. Menambahkan array baru dengan menggunakan perulangan for</h3>";
$weight = array(
    "Andy" => 70,
    "Barry" => 65,
    "Charlie" => 68
);

$wkeys = array_keys($weight);
$wvalues = array_values($weight);
$wlen = count($weight);

echo "<h4>Data Array weight:</h4>";

for ($i = 0; $i < $wlen; $i++) {
    echo "Key = " . $wkeys[$i] . ", Value = " . $wvalues[$i] . " kg<br>";
}
?>
