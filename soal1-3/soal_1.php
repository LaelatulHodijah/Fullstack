<?php
for ($i = 1; $i <= 100; $i++) {
    //SOAL 1c
    // Mengecek apakah angka merupakan kelipatan 3 dan 5
    if ($i % 3 == 0 && $i % 5 == 0) {
        echo "BIZZBUZZ";
    }
    //SOAL 1a
    // Mengecek apakah angka merupakan kelipatan 3
    elseif ($i % 3 == 0) {
        echo "BIZZ";
    }
    //SOAL 1b
    // Mengecek apakah angka merupakan kelipatan 5
    elseif ($i % 5 == 0) {
        echo "BUZZ";
    }
    // Jika tidak memenuhi kriteria di atas, mencetak angka itu sendiri
    else {
        echo $i;
    }

    echo "<br>";
}
?>
