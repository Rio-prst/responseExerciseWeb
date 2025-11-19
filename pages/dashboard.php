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
</body>
</html>