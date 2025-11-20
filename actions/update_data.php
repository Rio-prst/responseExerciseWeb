<?php
require "../config/connection.php";
require "../uploads/upload.php";

$id = $_POST["id"];
$name = trim($_POST["cake_name"]);
$price = $_POST["price"];
$stock = $_POST["stock"];
$old_foto = $_POST["old_foto"];

if ($_FILES["foto"]["error"] == 4) {
  $foto = $old_foto;
} else {
  $upload = uploadImage($_FILES["foto"]);

  if ($upload["status"] == false) {
    $foto = $old_foto;
  } else {
    $foto = $upload["file"];
    unlink("../uploads/images/" . $old_foto);
  }
}

$query = "UPDATE kue SET nama = ?, harga = ?, stok = ?, foto = ? WHERE id = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("ssssi", $name, $price, $stock, $foto, $id);
$stmt->execute();
header("Location: ../pages/dashboard.php");
$stmt->close();
?>