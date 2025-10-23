<?php
require_once 'config/database.php';
require_once 'classes/Produk.php';
// Ambil ID dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
// Buat object produk
$produkObj = new Produk();
// Ambil data produk
$produk = $produkObj->readOne($id);
// Jika produk tidak ditemukan
if (!$produk) {
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-
scale=1.0">
  <title>Detail Produk - <?php echo
                          htmlspecialchars($produk['nama']); ?></title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <h1> Detail Produk</📋 h1>
      <div class="product-detail">
        <div class="product-image">
          <?php if ($produk['foto']): ?>
            <img src="uploads/<?php echo $produk['foto']; ?>" alt="<?php echo $produk['nama']; ?>">
          <?php else: ?>
            <div class="no-image-large">Tidak ada gambar
            </div>
          <?php endif; ?>
        </div>
        <div class="product-details">
          <h2><?php echo htmlspecialchars($produk['nama']); ?>
            ></h2>
          <div class="detail-row">
            <strong>Harga:</strong>
            <span class="price-large">
              Rp <?php echo
                  number_format($produk['harga'], 0, ',', '.'); ?>
            </span>
          </div>
          <div class="detail-row">
            <strong>Deskripsi:</strong>
            <p><?php echo
                nl2br(htmlspecialchars($produk['deskripsi'])); ?></p>
          </div>
          <div class="detail-row">
            <strong>Ditambahkan:</strong>
            <span><?php echo date(
                    'd/m/Y H:i',
                    strtotime($produk['created_at'])
                  ); ?></span>
          </div>
          <div class="detail-row">
            <strong>Terakhir diupdate:</strong>
            <span><?php echo date(
                    'd/m/Y H:i',
                    strtotime($produk['updated_at'])
                  ); ?></span>
          </div>
          <div class="actions">
            <a href="index.php" class="btn btn-secondary">⬅️
              Kembali</a>
            <!-- Tombol Edit dan Delete akan dibuat di tugas -->
          </div>
        </div>
      </div>
  </div>
</body>

</html>