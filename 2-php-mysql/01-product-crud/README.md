# PHP & MySQL: Simple CRUD Website 

## CRUD Operations

### C - INSERT
```php
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require '../database/db_connect.php';

    $name = trim($_POST['name']);
    $price = $_POST['price'];

    // Basic validation
    if(empty($name) || !is_numeric($price)) {
        die("Invalid input");  // Kills script and shows message in browser
    try {
        $stmt = $pdo->prepare("INSERT INTO products (name, price) VALUES (?, ?)");
        $stmt->execute([$name, $price]);
        header("Location: ../index.php?success=1");
        exit; // stop further execution
    }
}
```
- add more explanation about the die, exit, header, ?success=1

---

### R - SELECT
```PHP
<?php
require './database/db_connect.php';  // connect to the db
try {
  $stmt = $pdo->query("SELECT * FROM products;");   // pdo object from the db_connect file
  $result = $stmt->fetchAll();   // returns array of all rows
}
```
- Then using a `foreach` loop we can then display the results.

---

### U - UPDATE
```php
<?php
require '../database/db_connect.php';

// Get existing data
if (isset($_GET['id'])) {
  try {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $product = $stmt->fetch();
    
    // check for the returned boolean
    if (!$product) {
      die("Product not found");
    }
  }
}

// Update data
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
  $id = $_POST['id'];
  $name = $_POST['name']; 
  $price = $_POST['price']; 

  try {
    $stmt = $pdo->prepare("UPDATE products SET name=?, price=? WHERE id=?");
    $stmt->execute([$name, $price, $id]);
    
    exit;
  } 
}
```
- More details about the form are in: [edit.php](./actions/edit.php)

--- 

### D - DELETE
```php
<?php
if(isset($_GET['id'])) {
  require '../database/db_connect.php';
  try {
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    // success =1 helps track operations
    header("Location: ../index.php?success=1");
    exit;
  } 
}

header("Location: ../index.php");
```
- the id is getting form the url when clicking on the delete link ...
- but why even indicating success ...?

---

### Notes

- The default method is `GET`. And it's the method used to transfer data in the url.

- Always catch PDO potential errors:
```php
<?php
try {
  // query code
}
catch (PDOException $e) {
  die("ERROR perforing operation form DB: " . $e->getMessage());
}
```

- Sending data in the url when clicking on the link (`GET` method):
```php
<a href="./actions/edit.php?id=<?= $product['id'] ?>">Edit</a>  
```
  - `<?= $product['id']?>` shorthand for `<?php echo $product['id']; ?>`.

- Always include the database connection when querying form the db:
```php
<?php
require './database/db_connect.php';  // connect to the db
```

- `fetch()` vs `fetchAll()`
  - `fetch()` = Single row
  - `fetchAll()` = All rows
