<?php
require_once 'config/database.php';
require_once 'classes/Produk.php';
$message = '';
$error = '';
// Proses form submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Buat object produk
  $produk = new Produk();
  // Set properties menggunakan setter
  $produk->setNama($_POST['nama']);
  $produk->setDeskripsi($_POST['deskripsi']);
  $produk->setHarga($_POST['harga']);
  // Handle upload foto
  if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $foto_name = $produk->uploadFoto($_FILES['foto']);
    if ($foto_name) {
      $produk->setFoto($foto_name);
    } else {
      $error = "Gagal upload foto. Pastikan file adalah gambar
(JPG, PNG, GIF) dan ukuran < 2MB";
    }
  }
  // Simpan ke database
  if (empty($error)) {
    if ($produk->create()) {
      $message = "Produk berhasil ditambahkan!";
      // Redirect setelah 2 detik
      header("refresh:2;url=index.php");
    } else {
      $error = "Gagal menambahkan produk!";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-
scale=1.0">
  <title>Tambah Produk - OOP PHP</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <h1> Tambah Produk Baru ➕</h1>
    <?php if ($message): ?>
      <div class="alert alert-success"><?php echo $message; ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
      <div class="alert alert-error"><?php echo $error; ?>></div>
    <?php endif; ?>
    <form method="POST" enctype="multipart/form-data"
      class="form">
      <div class="form-group">
        <label for="nama">Nama Produk:</label>
        <input type="text" id="nama" name="nama" required>
      </div>
      <div class="form-group">
        <label for="deskripsi">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi"
          rows="5"></textarea>
      </div>
      <div class="form-group">
        <label for="harga">Harga (Rp):</label>
        <input type="number" id="harga" name="harga"
          step="0.01" required>
      </div>
      <div class="form-group">
        <label for="foto">Foto Produk:</label>
        <input type="file" id="foto" name="foto"
          accept="image/*">
        <small>Format: JPG, PNG, GIF. Maksimal 2MB</small>
      </div>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">💾
          Simpan</button>
        <a href="index.php" class="btn btn-secondary">❌
          Batal</a>
      </div>
    </form>
  </div>
</body>

</html>