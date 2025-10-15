<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
// Buat Koneksi
$connection = mysqli_connect($dbhost, $dbuser, $dbpass);
if (!$connection) {
  die("Koneksi dengan database gagal: " . mysqli_connect_errno() . " -
" . mysqli_connect_error());
}
// Buat Database
$query = "CREATE DATABASE IF NOT EXISTS my_campus";
$result = mysqli_query($connection, $query);
if (!$result) {
  die("Query Error: " . mysqli_errno($connection) . " -
" . mysqli_error($connection));
} else {
  echo "Database <b>'my_campus'</b> berhasil dibuat... <br>";
}
// Pilih Database
$result = mysqli_select_db($connection, "my_campus");
if (!$result) {
  die("Query Error: " . mysqli_errno($connection) . " -
" . mysqli_error($connection));
} else {
  echo "Database <b>'my_campus'</b> berhasil dipilih... <br>";
}
// Buat Tabel student
$query = "DROP TABLE IF EXISTS student";
$query_result = mysqli_query($connection, $query);
if (!$query_result) {
  die("Query Error: " . mysqli_errno($connection) . " -
" . mysqli_error($connection));
} else {
  echo "Tabel <b>'student'</b> berhasil dihapus... <br>";
}
$query = "
CREATE TABLE student
(nim CHAR(8),
name VARCHAR(100),
birth_city VARCHAR(50),
birth_date DATE,
faculty VARCHAR(50),
department VARCHAR(50),
gpa DECIMAL(3,2),
PRIMARY KEY (nim))";
$query_result = mysqli_query($connection, $query);
if (!$query_result) {
  die("Query Error: " . mysqli_errno($connection) . " -
" . mysqli_error($connection));
} else {
  echo "Tabel <b>'student'</b> berhasil dibuat... <br>";
}
// Insert data student
$query = "
INSERT INTO student
VALUES
('12041952', 'Brian Yuko', 'Padang', '1996-11-23', 'FTIB', 'Sistem
Informasi', 3.1),
('12042010', 'Safira Yanuar', 'Bandung', '1994-08-22', 'FTIB',
'Sistem Informasi', 3.9),
('12042012', 'Rezja Zalva', 'Jakarta', '1997-12-31', 'FTIB',
'Informatika', 3.5),
('12042034', 'Agha Rizky', 'Jakarta', '1997-06-28', 'FTEIC', 'SainsData', 3.4),
('12042041', 'Adhiaksa', 'Medan', '1995-04-02', 'FTEIC','Bisnis
Digital', 3.7)";
$query_result = mysqli_query($connection, $query);
if (!$query_result) {
  die("Query Error: " . mysqli_errno($connection) . " -
" . mysqli_error($connection));
} else {
  echo "Tabel <b>'student'</b> berhasil diisi... <br>";
}
// Buat Tabel Admin
$query = "DROP TABLE IF EXISTS admin";
$query_result = mysqli_query($connection, $query);
if (!$query_result) {
  die("Query Error: " . mysqli_errno($connection) . " -
" . mysqli_error($connection));
} else {
  echo "Tabel <b>'admin'</b> berhasil dihapus... <br>";
}
$query = "CREATE TABLE admin (username VARCHAR(50), password
CHAR(40))";
$query_result = mysqli_query($connection, $query);
if (!$query_result) {
  die("Query Error: " . mysqli_errno($connection) . " -
" . mysqli_error($connection));
} else {
  echo "Tabel <b>'admin'</b> berhasil dibuat... <br>";
}
// Insert Data Admin
$username = "admin";
$password = sha1("<?php
session_start();
if (!isset($_SESSION["username"])) {
  header("Location: login.php");
}
include("connection.php");
if (isset($_GET["message"])) {
  $message = $_GET["message"];
}
$query = "SELECT * FROM student ORDER BY nim ASC";
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Data Mahasiswa</title>
  <link href="assets/style.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <div id="header">
      <h1 id="logo">Data Mahasiswa</h1>
    </div>
    <hr>
    <nav>
      <ul>
        <li><a href="student_view.php">Tampil</a></li>
        <li><a href="student_add.php">Tambah</a>
        <li><a href="logout.php">Logout</a>
      </ul>
    </nav>
    <?php
    if (isset($message)) {
      echo "<div class='pesan'>$message</div>";
    }
    ?>
    <table border="1">
      <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Fakultas</th>
        <th>Jurusan</th>
        <th>IPK</th>
      </tr>
      <?php
      $result = mysqli_query($connection, $query);
      if (!$result) {
        die("Query Error: " . mysqli_errno($connection) . " -
" . mysqli_error($connection));
      }
      while ($data = mysqli_fetch_assoc($result)) {
        $birth_date = strtotime($data["birth_date"]);
        $formatted_date = date("d-m-Y", $birth_date);
        echo "<tr>";
        echo "<td>$data[nim]</td>";
        echo "<td>$data[name]</td>";
        echo "<td>$data[birth_city]</td>";
        echo "<td>$formatted_date</td>";
        echo "<td>$data[faculty]</td>";
        echo "<td>$data[department]</td>";
        echo "<td>$data[gpa]</td>";
        echo "</tr>";
      }
      mysqli_free_result($result);
      mysqli_close($connection);
      ?>
    </table>
  </div>
</body>

</html>");
$query = "INSERT INTO admin VALUES ('$username','$password')";
$query_result = mysqli_query($connection, $query);
if (!$query_result) {
  die("Query Error: " . mysqli_errno($connection) . " -
" . mysqli_error($connection));
} else {
  echo "Tabel <b>'admin'</b> berhasil diisi... <br>";
}
mysqli_close($connection);