<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
  <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
     <form action="../actions/login_process.php" method="POST" class="shadow px-4 py-4 mb-5 bg-body-tertiary rounded" style="width: 400px;">
      <h1 class="text-center fs-2">Login</h1>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="username">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password">
      </div>

       <?php if (isset($_GET["error"])): ?>
        <?php if ($_GET["error"] == "wrong_password"): ?>
          <div class="alert alert-danger">Password salah!</div>
        <?php elseif ($_GET["error"] == "user_not_found"): ?>
          <div class="alert alert-danger">User tidak ditemukan!</div>
        <?php endif; ?>
      <?php endif; ?>

      <button type="submit" class="btn btn-primary w-100">Login</button>
      <p class="pt-3 text-center">Belum punya akun? <a href="register.php">Register</a></p>
    </form>
  </div>
</body>
</html>