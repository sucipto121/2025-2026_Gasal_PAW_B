<?php
$nilai = 90; 

    if ($nilai >= 85) {
        $grade = "A";
    } elseif ($nilai >= 70) {
        $grade = "B";
    } elseif ($nilai >= 55) {
        $grade = "C";
    } elseif ($nilai >= 40) {
        $grade = "D";
    } else {
        $grade = "E";
    }

    echo "Nilai Mahasiswa $nilai\n";
    echo "<br> Grade: $grade";
?>
