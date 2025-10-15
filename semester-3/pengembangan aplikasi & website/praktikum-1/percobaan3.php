<!DOCTYPE html>
<html>

<head>
    <title>Percobaan 3 - Struktur Kontrol</title>
</head>

<body>
    <h2>Percobaan 3: IF-ELSE Statement</h2>
    <?php
    $nilai = 85;
    $kehadiran = 90;
    echo "<h3>Sistem Penilaian Mahasiswa</h3>";
    echo "Nilai: $nilai<br>";
    echo "Kehadiran: $kehadiran%<br><br>";
    if ($nilai >= 85) {
        $grade = "A";
        $keterangan = "Sangat Baik";
    } elseif ($nilai >= 70) {
        $grade = "B";
        $keterangan = "Baik";
    } elseif ($nilai >= 60) {
        $grade = "C";
        $keterangan = "Cukup";
    } elseif ($nilai >= 50) {
        $grade = "D";
        $keterangan = "Kurang";
    } else {
        $grade = "E";
        $keterangan = "Sangat Kurang";
    }
    echo "Grade: <b>$grade</b><br>";
    echo "Keterangan: $keterangan<br><br>";
    if ($nilai >= 60 && $kehadiran >= 75) {
        echo "<b style='color: green;'>STATUS: LULUS </b>";
    } else {
        echo "<b style='color: red;'>STATUS: TIDAK LULUS </b>";
    }
    ?>
    <hr>
    <?php
    $umur = 20;
    echo "<h3>Kategori Usia</h3>";
    echo "Umur: $umur tahun<br>";
    if ($umur < 13) {
        echo "Kategori: Anak-anak";
    } elseif ($umur >= 13 && $umur < 20) {
        echo "Kategori: Remaja";
    } elseif ($umur >= 20 && $umur < 60) {
        echo "Kategori: Dewasa";
    } else {
        echo "Kategori: Lansia";
    }
    ?>
</body>

</html>