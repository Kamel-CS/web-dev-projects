<?php
require '../database/db_connect.php';

// Get existing data
if (isset($_GET['id'])) {
  try {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $product = $stmt->fetch();  // why not fetchAll() ?
    
    // check for the returned boolean
    if (!$product) {
      die("Product not found");
    }
  } catch(PDOException $e) {
      die("Error: " . $e->getMessage());
  }
}

// Update data
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
  $id = $_POST['id'];
  $name = $_POST['name']; 
  $price = $_POST['price']; 
  $quantity = $_POST['quantity']; 
  $description = $_POST['description']; 

  try {
    $stmt = $pdo->prepare("UPDATE products SET name=?, price=?, quantity=?, description=? WHERE id=?");
    $stmt->execute([$name, $price, $quantity, $description, $id]);
    
    if ($stmt->rowCount() > 0) {
      header("Location: ../index.php?success=1");
    } else {
      header("Location: ../index.php?error=no_changes");
    }
    exit;
  } catch(PDOException $e) {
      die("Error: " . $e->getMessage());
  }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
</head>
<body>
    <h2>Update Product</h2>
    <form method="POST">
        <!-- Hidden ID field -->
        <input type="hidden" name="id" value="<?= $product['id'] ?? '' ?>">
        
        <div>
            <label>Product Name</label>
            <input type="text" name="name" value="<?= $product['name'] ?? '' ?>" required>
        </div>
        <div>
            <label>Price</label>
            <input type="number" step="0.01" name="price" value="<?= $product['price'] ?? '' ?>" required>
        </div>
        <div>
            <label>Quantity</label>
            <input type="number" step="1" name="quantity" value="<?= $product['quantity'] ?? '' ?>" required>
        </div>
        <div>
            <label>Description</label>
            <textarea name="description"><?= $product['description'] ?? '' ?></textarea>
        </div>
        <button type="submit">Update</button>
    </form>
</body>
</html>
