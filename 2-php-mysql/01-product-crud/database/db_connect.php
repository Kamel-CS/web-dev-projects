<?php

$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "crud_db";

try {
  $pdo = new PDO("mysql:host={$db_server};dbname={$db_name}", $db_user, $db_password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
