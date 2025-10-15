<!DOCTYPE html>
<html>

<head>
    <title>Percobaan 5 - Array</title>
    <style>
        .box {
            border: 1px solid #ddd;
            padding: 15px;
            margin: 10px 0;
            background: #f9f9f9;
        }
    </style>
</head>

<body>
    <h2>Percobaan 5: Array</h2>
    <div class="box">
        <h3>1. Array Indexed (Numerik)</h3>
        <?php
        $buah = ["Apel", "Jeruk", "Mangga", "Pisang", "Anggur"];
        echo "Buah pertama: " . $buah[0] . "<br>";
        echo "Buah ketiga: " . $buah[2] . "<br>";
        echo "Jumlah buah: " . count($buah) . "<br><br>";
        echo "<b>Semua buah:</b><br>";
        foreach ($buah as $item) {
            echo "- $item<br>";
        }
        ?>
    </div>
    <div class="box">
        <h3>2. Array Associative (Key-Value)</h3>
        <?php
        $mahasiswa = [
            "nim" => "2024001",
            "nama" => "Budi Santoso",
            "prodi" => "Teknik Informatika",
            "semester" => 5,
            "ipk" => 3.75
        ];
        echo "NIM: " . $mahasiswa['nim'] . "<br>";
        echo "Nama: " . $mahasiswa['nama'] . "<br>";
        echo "Prodi: " . $mahasiswa['prodi'] . "<br>";
        echo "Semester: " . $mahasiswa['semester'] . "<br>";
        echo "IPK: " . $mahasiswa['ipk'] . "<br>";
        ?>
    </div>
    <div class="box">
        <h3>3. Array Multidimensi</h3>
        <?php
        $nilai = [
            [
                "nama" => "Budi",
                "matematika" => 85,
                "fisika" => 78,
                "kimia" => 90
            ],
            [
                "nama" => "Ani",
                "matematika" => 92,
                "fisika" => 88,
                "kimia" => 85
            ],
            ["nama" => "Citra", "matematika" => 78, "fisika" =>
            82, "kimia" => 88]
        ];
        echo "<table border='1' cellpadding='8'>";
        echo
        "<tr><th>Nama</th><th>Matematika</th><th>Fisika</th><th>Kimia</th>
<th>Rata-rata</th></tr>";
        foreach ($nilai as $mhs) {
            $rata = ($mhs['matematika'] + $mhs['fisika'] +
                $mhs['kimia']) / 3;
            echo "<tr>";
            echo "<td>" . $mhs['nama'] . "</td>";
            echo "<td>" . $mhs['matematika'] . "</td>";
            echo "<td>" . $mhs['fisika'] . "</td>";
            echo "<td>" . $mhs['kimia'] . "</td>";
            echo "<td>" . number_format($rata, 2) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </div>
    <div class="box">
        <h3>4. Operasi Array</h3>
        <?php
        $angka = [5, 2, 8, 1, 9];
        echo "Array awal: " . implode(", ", $angka) . "<br>";
        array_push($angka, 10);
        echo "Setelah push(10): " . implode(", ", $angka) .
            "<br>";
        sort($angka);
        echo "Setelah sort: " . implode(", ", $angka) . "<br>";
        rsort($angka);
        echo "Setelah rsort: " . implode(", ", $angka) . "<br>";
        echo "Nilai max: " . max($angka) . "<br>";
        echo "Nilai min: " . min($angka) . "<br>";
        echo "Jumlah total: " . array_sum($angka) . "<br>";
        ?>
    </div>
</body>

</html>