<?php

if(isset($_GET['id'])) {
  require '../database/db_connect.php';
  try {
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    // sucess=1 for the dev indicating suceessuful operation
    header("Location: ../index.php?success=1");
    exit;
    echo $_GET['id'];
  } 
  catch(PDOException $e) {
    die("Error: " . $e->getMessage());
  }
}

header("Location: ../index.php");
