<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require '../database/db_connect.php';

    $name = trim($_POST['name']);
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'] ?? '';

    // Basic validation
    if(empty($name) || !is_numeric($price) || !is_numeric($quantity)) {
        die("Invalid input");
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO products (name, price, quantity, description) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $price, $quantity, $description]);
        header("Location: ../index.php?success=1");
        exit;
    } catch(PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>
    <h2>Create Product</h2>
    <form method="POST">
        <div>
            <label>Product Name</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Price</label>
            <input type="number" step="0.01" name="price" required>
        </div>
        <div>
            <label>Quantity</label>
            <input type="number" step="1" name="quantity" required>
        </div>
        <div>
          <label>Description</label>
          <textarea name="description"></textarea>
        </div>
        <button type="submit">Create</button>
    </form>
</body>
</html>
