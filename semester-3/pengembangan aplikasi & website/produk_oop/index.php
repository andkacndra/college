<?php
require_once 'config/database.php';
require_once 'classes/Produk.php';
// Buat object dari class Produk
$produk = new Produk();
// Ambil semua data produk
$result = $produk->readAll();
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-
scale=1.0">
  <title>Daftar Produk - OOP PHP</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <h1> Daftar Produk</📦 h1>
      <div class="action-bar">
        <a href="create.php" class="btn btn-primary"> Tambah➕
          Produk</a>
      </div>
      <div class="product-grid">
        <?php if ($result->num_rows > 0): ?>
          <?php while ($row = $result->fetch_assoc()): ?>
            <div class="product-card">
              <?php if ($row['foto']): ?>
                <img src="uploads/<?php echo
                                  $row['foto']; ?>"
                  alt="<?php echo $row['nama']; ?>">
              <?php else: ?>
                <div class="no-image">Tidak ada
                  gambar</div>
              <?php endif; ?>
              <div class="product-info">
                <h3><?php echo
                    htmlspecialchars($row['nama']); ?></h3>
                <p class="description">
                  <?php echo
                  htmlspecialchars(substr($row['deskripsi'], 0, 100)); ?>...
                </p>
                <p class="price">Rp <?php echo
                                    number_format($row['harga'], 0, ',', '.'); ?></p>
                <div class="actions">
                  <a href="detail.php?id=<?php echo
                                          $row['id']; ?>"
                    class="btn btn-info">Detail</a>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php else: ?>
          <p class="no-data">Belum ada produk. Silakan tambah
            produk baru.</p>
        <?php endif; ?>
      </div>
  </div>
</body>

</html>