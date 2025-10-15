<!DOCTYPE html>
<html>
<head>
  <title>Form Pendaftaran Mahasiswa</title>
  <style>
    body { font-family: Arial; max-width: 600px; margin: 50px auto; }
    .form-group { margin: 15px 0; }
    label { display: block; font-weight: bold; margin-bottom: 5px; }
    input, select, textarea { width: 100%; padding: 8px; box-sizing: border-box; }
    button { background: #4CAF50; color: white; padding: 10px 15px; border: none; cursor: pointer; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    a.btn { background: #2196F3; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; }
    a.del { background: #f44336; }
  </style>
</head>
<body>

<h2>Form Pendaftaran Mahasiswa</h2>

<form method="POST" action="proses.php">
  <div class="form-group">
    <label>NIM:</label>
    <input type="text" name="nim" required>
  </div>

  <div class="form-group">
    <label>Nama:</label>
    <input type="text" name="nama" required>
  </div>

  <div class="form-group">
    <label>Email:</label>
    <input type="email" name="email" required>
  </div>

  <div class="form-group">
    <label>Program Studi:</label>
    <select name="prodi" required>
      <option value="">Pilih Prodi</option>
      <option value="Teknik Informatika">Teknik Informatika</option>
      <option value="Sistem Informasi">Sistem Informasi</option>
      <option value="Teknik Komputer">Teknik Komputer</option>
    </select>
  </div>

  <div class="form-group">
    <label>Semester:</label>
    <input type="number" name="semester" min="1" max="14" required>
  </div>

  <div class="form-group">
    <label>Alamat:</label>
    <textarea name="alamat" rows="3" required></textarea>
  </div>

  <button type="submit">Simpan</button>
</form>

<hr>
<h3>Data Mahasiswa</h3>

<?php
if(file_exists('data.json')){
  $data = json_decode(file_get_contents('data.json'), true);
  if(!empty($data)){
    echo "<table>
          <tr><th>No</th><th>NIM</th><th>Nama</th><th>Prodi</th><th>Aksi</th></tr>";
    $no = 1;
    foreach($data as $mhs){
      echo "<tr>
              <td>$no</td>
              <td>{$mhs['nim']}</td>
              <td>{$mhs['nama']}</td>
              <td>{$mhs['prodi']}</td>
              <td>
                <a href='edit.php?nim={$mhs['nim']}' class='btn'>Edit</a>
                <a href='delete.php?nim={$mhs['nim']}' class='btn del' onclick='return confirm(\"Yakin hapus data?\")'>Hapus</a>
              </td>
            </tr>";
      $no++;
    }
    echo "</table>";
  } else {
    echo "<p>Belum ada data mahasiswa.</p>";
  }
}
?>

</body>
</html>
