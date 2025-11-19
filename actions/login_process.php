<?php
require "../config/connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"]=="POST") {
  $username = trim($_POST["username"]);
  $password = trim($_POST["password"]);

  $stmt = $connection->prepare("SELECT username, password FROM users WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows == 0) {
    header("location: ../pages/login.php?error=user_not_found");
    exit;
  }

  $row = $result->fetch_assoc();

  if (password_verify($password, $row["password"])) {
    $_SESSION["username"] = $row["username"];
    header("location: ../pages/dashboard.php?login_success");
    exit;
  } else {
     header("location: ../pages/login.php?error=wrong_password");
     exit;
  }
}
?>