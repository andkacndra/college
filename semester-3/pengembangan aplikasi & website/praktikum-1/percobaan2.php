<!DOCTYPE html>
<html>

<head>
    <title>Percobaan 2 - Tipe Data & Operator</title>
</head>

<body>
    <h2>Percobaan 2: Tipe Data & Operator</h2>
    <?php
    $angka1 = 10;
    $angka2 = 5;
    $teks = "PHP Programming";
    $benar = true;
    $salah = false;
    echo "<h3>Tipe Data:</h3>";
    echo "Integer: " . $angka1 . "<br>";
    echo "String: " . $teks . "<br>";
    echo "Boolean: " . ($benar ? "true" : "false") . "<br>";
    echo "<h3>Operator Aritmatika:</h3>";
    echo "$angka1 + $angka2 = " . ($angka1 + $angka2) . "<br>";
    echo "$angka1 - $angka2 = " . ($angka1 - $angka2) . "<br>";
    echo "$angka1 * $angka2 = " . ($angka1 * $angka2) . "<br>";
    echo "$angka1 / $angka2 = " . ($angka1 / $angka2) . "<br>";
    echo "$angka1 % $angka2 = " . ($angka1 % $angka2) . "<br>";
    echo "<h3>Operator Perbandingan:</h3>";
    echo "$angka1 > $angka2: " . ($angka1 > $angka2 ? "true" :
        "false") . "<br>";
    echo "$angka1 < $angka2: " . ($angka1 < $angka2 ? "true" :
        "false") . "<br>";
    echo "$angka1 == $angka2: " . ($angka1 == $angka2 ? "true" :
        "false") . "<br>";
    ?>
</body>

</html>