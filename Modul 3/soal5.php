<?php
echo "<h3>1. Menambahkan lima data  baru dalam array</h3>";
$students = array
(
    array("Alex","220401","0812345678"),
    array("Bianca","220402","0812345687"),
    array("Candice","220403","0812345665"),
    array("Doni","220404","0812345699"),
    array("Eka","220405","0812345611"),
    array("Fajar","220406","0812345622"),
    array("Gita","220407","0812345633"),
    array("Hendra","220408","0812345644")
);
echo "<h3>2.Tampilan data dalam array";
echo "<h3>Data Students</h3>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Name</th><th>NIM</th><th>Mobile</th></tr>";

for ($row = 0; $row < count($students); $row++) {
    echo "<tr>";
    for ($col = 0; $col < 3; $col++) {
        echo "<td>".$students[$row][$col]."</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
