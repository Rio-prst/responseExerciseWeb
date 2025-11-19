<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db = "toko_kue";
$port = 3306;

try {
  $connection = new mysqli($hostname, $username, $password, $db, $port);
} catch (Exception $e) {
  echo $e;
}
?>