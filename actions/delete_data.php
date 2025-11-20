<?php
require "../config/connection.php";

$id = $_GET["id"];

if (!isset($_GET['id'])) {
  echo "Id tidak ditemukan";
  exit;
}

$query = "SELECT foto FROM kue WHERE id = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
  echo "Data tidak ditemukan";
  exit;
}

$foto = $data["foto"];
$path = "../uploads/images/" . $foto;

if (file_exists($path)) {
  unlink($path);
}

$deleteQuery = "DELETE FROM kue WHERE id = ?";
$stmt2 = $connection->prepare($deleteQuery);
$stmt2->bind_param("i", $id);
$stmt2->execute();

header("Location: ../pages/dashboard.php");
exit;
$stmt->close();
$stmt2->close();
?>