<?php
require "../config/connection.php";
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: login.php");
  exit;
}

if (!isset($_GET["id"])) {
  echo "Id tidak ditemukan";
  exit;
}

$id = $_GET["id"];
$query = "SELECT * FROM kue WHERE id = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ediit Cake Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
  <div class="d-flex justify-content-center p-4">
     <form action="../actions/update_data.php" method="POST" class="shadow px-4 py-4 mb-5 bg-body-tertiary rounded" style="width: 550px;" enctype="multipart/form-data">
      <h1 class="fs-3">Edit Kue</h1>

      <input type="hidden" name="old_foto" value="<?= $data['foto'] ?>">
      <input type="hidden" name="id" value="<?= $data['id'] ?>">

      <div class="mb-3">
        <label class="form-label">Foto Lama:</label>
        <div class="card" style="width: 12rem;">
          <img src="../uploads/images/<?= $data['foto'] ?>" alt="<?= $data['nama'] ?>" class="w-100" style="height: 140px; object-fit: cover;">
        </div>
        <!-- <label for="foto" class="form-label">Foto Lama:</label> -->
      </div>
      <div class="mb-3">
        <label for="foto" class="form-label">Ganti Foto (Opsional)</label>
        <input type="file" name="foto" class="form-control" id="foto">
      </div>
      <div class="mb-3">
        <label for="cake_name" class="form-label">Nama Kue</label>
        <input type="text" name="cake_name" class="form-control" id="cake_name" value="<?= $data['nama'] ?>">
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Harga</label>
        <input type="number" name="price" class="form-control" id="price" value="<?= $data['harga'] ?>">
      </div>
      <div class="mb-3">
        <label for="stock" class="form-label">Stok</label>
        <input type="number" name="stock" class="form-control" id="stock" value="<?= $data['stok'] ?>">
      </div>
      <button type="submit" class="btn btn-warning">Simpan perubahan</button>
      <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</body> 
</html>