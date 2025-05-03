<?php
require './database/db_connect.php';  // connect to the db

// query from the db
try {
  $stmt = $pdo->query("SELECT * FROM products;");   // pdo object from the db_connect file
  $products = $stmt->fetchAll();   // store the fetched data in a var
}
catch (PDOException $e) {
  die("ERROR Fetching Data form DB: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <header>
      <h1>Products Tracker</h1> 
    </header>
    <main>
      <div class="products">
        <h2 class="products__titel">Products <a href="./actions/create.php"><button class="products__button">Add New</button></a></h2> 
        <table class="products__table">
          <thead>
            <tr>
              <th>Name</th> 
              <th>Price</th> 
              <th>Quantity</th> 
              <th>Actions</th> 
            </tr> 
          </thead> 
          <tbody>
            <?php foreach($products as $product): ?>
            <tr>
              <td><?= htmlspecialchars($product['name']) ?></td> 
              <td>$<?= number_format($product['price'], 2) ?></td> 
              <td><?= htmlspecialchars($product['quantity']) ?></td> 
              <td>
                <!-- This one uses GET method -->
                <a href="./actions/edit.php?id=<?= $product['id'] ?>">Edit</a>  
                <a href="./actions/delete.php?id=<?= $product['id'] ?>" onclick="return confirm('Delete this product?')">Delete</a> 
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main> 
    <footer>
      <p>&copy; 2025 Kamel Demri</p> 
    </footer>
  </body>
</html>
