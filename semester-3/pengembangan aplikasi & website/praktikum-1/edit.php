<?php
$file = 'data.json';
$data = json_decode(file_get_contents($file), true);
$nim = $_GET['nim'];

foreach($data as $key => $mhs){
  if($mhs['nim'] == $nim){
    $editData = $mhs;
    $index = $key;
    break;
  }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $data[$index] = [
    "nim" => $_POST['nim'],
    "nama" => $_POST['nama'],
    "email" => $_POST['email'],
    "prodi" => $_POST['prodi'],
    "semester" => $_POST['semester'],
    "alamat" => $_POST['alamat']
  ];
  file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
  header("Location: form.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Mahasiswa</title>
  <style>
    body { font-family: Arial; max-width: 600px; margin: 50px auto; }
    .form-group { margin: 15px 0; }
  </style>
</head>
<body>

<h2>Edit Data Mahasiswa</h2>

<form method="POST">
  <div class="form-group">
    <label>NIM:</label>
    <input type="text" name="nim" value="<?= $editData['nim'] ?>" readonly>
  </div>

  <div class="form-group">
    <label>Nama:</label>
    <input type="text" name="nama" value="<?= $editData['nama'] ?>" required>
  </div>

  <div class="form-group">
    <label>Email:</label>
    <input type="email" name="email" value="<?= $editData['email'] ?>" required>
  </div>

  <div class="form-group">
    <label>Program Studi:</label>
    <input type="text" name="prodi" value="<?= $editData['prodi'] ?>" required>
  </div>

  <div class="form-group">
    <label>Semester:</label>
    <input type="number" name="semester" value="<?= $editData['semester'] ?>" required>
  </div>

  <div class="form-group">
    <label>Alamat:</label>
    <textarea name="alamat" rows="3" required><?= $editData['alamat'] ?></textarea>
  </div>

  <button type="submit">Update</button>
</form>

</body>
</html>