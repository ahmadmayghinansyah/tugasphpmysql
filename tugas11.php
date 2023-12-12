<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$konek = new mysqli($servername, $username, $password);

// Check connection
if ($konek->connect_error) {
  die("gagal konek: " . $conn->connect_error);
}
echo "sukses mengkonek<br>";

// Create database
$sql_create_db = "CREATE DATABASE IF NOT EXISTS mydatabase";
if ($konek->query($sql_create_db) === TRUE) {
  echo "Database terbuat<br>";
} else {
  echo "gagal membuat database: " . $konek->error . "<br>";
}

// Select the database
$konek->select_db("mydatabase");

// SQL to create table
$sql_create_table = "CREATE TABLE IF NOT EXISTS lampu (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(30) NOT NULL,
  wat VARCHAR(10) NOT NULL,
  harga DECIMAL(10,2) NOT NULL
)";

// Create table
if ($konek->query($sql_create_table) === TRUE) {
  echo "berhasil membuat tabel lampu<br>";
} else {
  echo "gagal membuat tabel: " . $konek->error . "<br>";
}

// Insert data into table
$sql_insert = "INSERT INTO lampu (nama, wat, harga) VALUES
  ('LG', '15wat', '16000'),
  ('Philips', '10wat', '12000'),
  ('Osram', '30wat', '32000')";

if ($konek->query($sql_insert) === TRUE) {
  echo "sukses menambahkan data<br>";
} else {
  echo "gagal menambahkan data: " . $konek->error . "<br>";
}

// Update table
$sql_update = "UPDATE lampu SET wat='20wat' WHERE id=2";

if ($konek->query($sql_update) === TRUE) {
  echo "update sukses";
} else {
  echo "gagal mengupdate: " . $konek->error;
}

// Close the connection
$konek->close();
?>
