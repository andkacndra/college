<!DOCTYPE html>
<html>

<head>
    <title>Percobaan 1 - Hello World</title>
</head>

<body>
    <h2>Percobaan 1: Hello World & Variabel</h2>
    <?php
    echo "<h3>Hello World!</h3>";
    echo "Selamat datang di dunia PHP<br>";
    $nama = "Budi Santoso";
    $nim = "2024001";
    $prodi = "Teknik Informatika";
    $ipk = 3.75;
    echo "<hr>";
    echo "<b>Biodata Mahasiswa:</b><br>";
    echo "Nama: " . $nama . "<br>";
    echo "NIM: " . $nim . "<br>";
    echo "Prodi: " . $prodi . "<br>";
    echo "IPK: " . $ipk . "<br>";
    ?>
</body>

</html>