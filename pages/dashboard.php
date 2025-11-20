<?php
require "../config/connection.php";
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: login.php");
  exit;
}

$query = "SELECT * FROM kue";
$result = $connection->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
  <?php if (isset($_GET["login_success"])): ?>
    <script>
      alert("Login sukses")
      window.location = "dashboard.php";
    </script>
  <?php endif; ?>

  <nav class="navbar bg-white shadow-sm px-5 py-3">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <h3 class="m-0">Katalog Kue</h3>
      <a href="../actions/logout.php" class="btn btn-danger">Logout</a>
    </div>
  </nav>
  <div class="container mt-4">
    <div class="row">
      <?php 
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        ?>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <img src="../uploads/images/<?=$row['foto']?>" class="card-img-top" style="height: 150px; object-fit: cover" alt="<?= $row['nama'] ?>">
              <div class="card-body">
                <h5 class="card-title"><?= $row['nama'] ?></h5>
                <p class="card-text">Harga: <?= $row['harga'] ?></p>
                <p class="card-text">Stok: <?= $row['stok'] ?></p>
                <a href="edit_cake.php?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
                <a href="../actions/delete_data.php?id=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus kue ini?');">Hapus</a>
              </div>
            </div>
          </div>
        <?php
        }
      } else {
        echo "<p style='text-align: center;'>Belum ada kue di katalog</p>";
      }
      ?>
    </div>
    <a href="add_cake.php" class="btn btn-primary">Tambah Kue</a>
  </div>
</body>
</html>