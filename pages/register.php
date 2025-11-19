<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
  <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
     <form action="../actions/register_process.php" method="POST" class="shadow px-4 py-4 mb-5 bg-body-tertiary rounded" style="width: 400px;">
      <h1 class="text-center fs-2">Register</h1>

      <?php if (isset($_GET["success"])): ?>
        <script>
          alert("Registrasi berhasil");
          window.location = "./login.php";
        </script>
      <?php endif;?>

      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" id="username">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password">
      </div>

      <?php if (isset($_GET["user_is_exist"])): ?>
        <div class="alert alert-danger">Username sudah digunakan!</div>
      <?php endif;?>

      <button type="submit" class="btn btn-success w-100">Register</button>
      <p class="pt-3 text-center">Sudah punya akun? <a href="login.php">Login</a></p>
    </form>
  </div>
</body>
</html>