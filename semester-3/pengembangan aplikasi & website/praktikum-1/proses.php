<!DOCTYPE html>
<html>
<head>
    <title>Hasil Pendaftaran</title>
    <style>
        body {
            font-family: Arial;
            max-width: 600px;
            margin: 50px auto;
        }

        .card {
            background: #f9f9f9;
            padding: 20px;
            border-radius:8px;
            border: 1px solid #ddd;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding:
                15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
        }

        td {
            padding: 8px;
        }

        .label {
            font-weight: bold;
            width: 150px;
        }

        .btn {
            display: inline-block;
            background: #2196F3;
            color:
                white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius:
                5px;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $nim = $_POST['nim'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $prodi = $_POST['prodi'];
  $semester = $_POST['semester'];
  $alamat = $_POST['alamat'];

  $dataBaru = [
    "nim" => $nim,
    "nama" => $nama,
    "email" => $email,
    "prodi" => $prodi,
    "semester" => $semester,
    "alamat" => $alamat
  ];

  $file = 'data.json';
  $data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
  $data[] = $dataBaru;
  file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

  header("Location: form.php");
  exit;
}
?>
</body>
</html>