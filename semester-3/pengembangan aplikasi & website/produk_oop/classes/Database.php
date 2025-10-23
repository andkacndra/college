<?php

/**
 * Class Database
 * Menangani koneksi ke database menggunakan MySQLi
 */
class Database
{
  // Properties
  private $host;
  private $user;
  private $pass;
  private $dbname;
  private $conn;
  /**
   * Constructor
   * Dipanggil otomatis saat object dibuat
   */
  public function __construct()
  {
    $this->host = DB_HOST;
    $this->user = DB_USER;
    $this->pass = DB_PASS;
    $this->dbname = DB_NAME;
    $this->connect();
  }
  /**
   * Method untuk koneksi ke database
   */
  private function connect()
  {
    $this->conn = new mysqli(
      $this->host,
      $this->user,
      $this->pass,
      $this->dbname
    );
    // Check connection
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }
  /**
   * Getter untuk mendapatkan connection
   */
  public function getConnection()
  {
    return $this->conn;
  }
  /**
   * Destructor
   * Dipanggil otomatis saat object dihapus
   */
  public function __destruct()
  {
    if ($this->conn) {
      $this->conn->close();
    }
  }
}