<?php
require "../config/connection.php";
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Cake Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
  <div class="d-flex justify-content-center p-4">
     <form action="../actions/insert_to_katalog.php" method="POST" class="shadow px-4 py-4 mb-5 bg-body-tertiary rounded" style="width: 550px;" enctype="multipart/form-data">
      <h1 class="fs-3">Tambah Kue</h1>
      <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" name="foto" class="form-control" id="foto">
      </div>
      <div class="mb-3">
        <label for="cake_name" class="form-label">Nama Kue</label>
        <input type="text" name="cake_name" class="form-control" id="cake_name">
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Harga</label>
        <input type="number" name="price" class="form-control" id="price">
      </div>
      <div class="mb-3">
        <label for="stock" class="form-label">Stok</label>
        <input type="number" name="stock" class="form-control" id="stock">
      </div>
      <input type="submit" class="btn btn-primary" value="Tambah" name="add_cake">
      <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</body> 
</html>