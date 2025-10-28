<?php
echo "<h2>Eksplorasi Lebih Lanjut terhadap Array</h2>";
echo "<h3>1. Fungsi array_push()</h3>";
$names = ["Andy", "Barry", "Charlie"];
array_push($names, "Doni", "Eka");
echo "Setelah array_push: ";
print_r($names);
echo "<br><br>";

echo "<h3>2. Fungsi array_merge()</h3>";
$array1 = ["A", "B", "C"];
$array2 = ["D", "E", "F"];
$merged = array_merge($array1, $array2);
echo "Hasil penggabungan array: ";
print_r($merged);
echo "<br><br>";

echo "<h3>3. Fungsi array_values()</h3>";
$students = [
    "Alex" => "220401",
    "Bianca" => "220402",
    "Candice" => "220403"
];
$values = array_values($students);
echo "Nilai dari array asosiatif: ";
print_r($values);
echo "<br><br>";

echo "<h3>4. Fungsi array_search()</h3>";
$search_result = array_search("220402", $students);
echo "Pencarian NIM '220402' ditemukan pada key: " . $search_result;
echo "<br><br>";

echo "<h3>5. Fungsi array_filter()</h3>";
$numbers = [10, 25, 30, 5, 50, 3];
$filtered = array_filter($numbers, function($num) {
    return $num > 20;  
});
echo "Angka lebih dari 20: ";
print_r($filtered);
echo "<br><br>";

echo "<h3>6. Fungsi Sorting</h3>";

$sortArray = ["Doni", "Andy", "Charlie", "Bianca"];
echo "<b>Sebelum sort:</b> ";
print_r($sortArray);
echo "<br>";

sort($sortArray);
echo "<b>Setelah sort() (menaik):</b> ";
print_r($sortArray);
echo "<br>";

rsort($sortArray);
echo "<b>Setelah rsort() (menurun):</b> ";
print_r($sortArray);
echo "<br><br>";

$studentAges = ["Andy"=>21, "Barry"=>19, "Charlie"=>23];

echo "<b>Sebelum diurutkan (asosiatif):</b> ";
print_r($studentAges);
echo "<br>";

asort($studentAges);
echo "<b>Setelah asort() (urut berdasarkan nilai):</b> ";
print_r($studentAges);
echo "<br>";

ksort($studentAges);
echo "<b>Setelah ksort() (urut berdasarkan key):</b> ";
print_r($studentAges);
echo "<br>";
?>
