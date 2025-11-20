<?php
require "../config/connection.php";
require "../uploads/upload.php";

if (isset($_POST["add_cake"])) {
  $name = trim($_POST["cake_name"]);
  $price = $_POST["price"];
  $stock = $_POST["stock"];

  $upload = uploadImage($_FILES["foto"]);

  if ($upload["status"] == false) {
    echo "Gagal menambahkan foto";
  }

  $image = $upload["file"];

  $stmt = $connection->prepare("INSERT INTO kue(nama, harga, stok, foto) VALUES(?,?,?,?)");
  $stmt->bind_param("ssss", $name, $price, $stock, $image);

  if ($stmt->execute()) {
    header("Location: ../pages/dashboard.php");
    exit;
  } else {
    echo "Terjadi kesalahan: " . $connection->connect_error;
  }
  $stmt->close();
}
?>