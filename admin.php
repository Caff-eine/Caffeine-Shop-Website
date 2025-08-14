<?php
session_start();
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/config.php';

$pdo = get_db();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_password'])) {
  if (hash_equals(ADMIN_PASSWORD, $_POST['login_password'])) {
    $_SESSION['is_admin'] = true;
  }
  header('Location: admin.php');
  exit;
}

if (!empty($_GET['logout'])) {
  unset($_SESSION['is_admin']);
  header('Location: admin.php');
  exit;
}

$isAdmin = !empty($_SESSION['is_admin']);

if ($isAdmin && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
  $action = $_POST['action'];
  if ($action === 'create') {
    $stmt = $pdo->prepare('INSERT INTO products (name, price, image_url, category, description) VALUES (:name, :price, :image_url, :category, :description)');
    $stmt->execute([
      ':name' => trim($_POST['name'] ?? ''),
      ':price' => (float) ($_POST['price'] ?? 0),
      ':image_url' => trim($_POST['image_url'] ?? ''),
      ':category' => trim($_POST['category'] ?? 'gear'),
      ':description' => trim($_POST['description'] ?? ''),
    ]);
  } elseif ($action === 'update') {
    $stmt = $pdo->prepare('UPDATE products SET name = :name, price = :price, image_url = :image_url, category = :category, description = :description WHERE id = :id');
    $stmt->execute([
      ':id' => (int) ($_POST['id'] ?? 0),
      ':name' => trim($_POST['name'] ?? ''),
      ':price' => (float) ($_POST['price'] ?? 0),
      ':image_url' => trim($_POST['image_url'] ?? ''),
      ':category' => trim($_POST['category'] ?? 'gear'),
      ':description' => trim($_POST['description'] ?? ''),
    ]);
  } elseif ($action === 'delete') {
    $stmt = $pdo->prepare('DELETE FROM products WHERE id = :id');
    $stmt->execute([':id' => (int) ($_POST['id'] ?? 0)]);
  }
  header('Location: admin.php');
  exit;
}

$products = fetch_all_products($pdo);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Caffeine</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header class="header">
      <img class="logo" src="Images/logo.png"/>
      <nav class="navbar">
        <a href="index.php#HOME">HOME</a>
        <a href="index.php#MENU">MENU</a>
        <a href="index.php#PRODUCTS">PRODUCTS</a>
        <a href="cart.php">CART</a>
      </nav>
    </header>

    <section class="menu" style="padding-top:80px;">
      <h1 class="heading">Admin</h1>

      <?php if (!$isAdmin) { ?>
        <form action="admin.php" method="post" class="contact-form" style="max-width:400px;margin:20px auto;">
          <input type="password" name="login_password" placeholder="Admin password" required>
          <button type="submit">Login</button>
        </form>
      <?php } else { ?>
        <div style="max-width:1000px;margin: 0 auto;">
          <a class="btn" href="admin.php?logout=1">Logout</a>

          <h2 style="color:#fff;margin-top:20px;">Create Product</h2>
          <form action="admin.php" method="post" class="contact-form">
            <input type="hidden" name="action" value="create">
            <input type="text" name="name" placeholder="Name" required>
            <input type="number" step="0.01" name="price" placeholder="Price" required>
            <input type="text" name="image_url" placeholder="Image URL" required>
            <input type="text" name="category" placeholder="Category (drink or gear)" required>
            <textarea name="description" placeholder="Description" rows="3"></textarea>
            <button type="submit">Create</button>
          </form>

          <h2 style="color:#fff;margin-top:20px;">All Products</h2>
          <div class="box-container">
            <?php foreach ($products as $p) { ?>
              <div class="box" style="text-align:left;">
                <img src="<?php echo htmlspecialchars($p['image_url']); ?>" alt="" style="height:120px;object-fit:cover;">
                <h3><?php echo htmlspecialchars($p['name']); ?></h3>
                <div class="price">$<?php echo format_price((float)$p['price']); ?></div>
                <div style="color:#fff;font-size:13px;margin:8px 0;">Category: <?php echo htmlspecialchars($p['category']); ?></div>
                <div style="color:#fff;font-size:13px;">Description: <?php echo htmlspecialchars($p['description'] ?? ''); ?></div>
                <form action="admin.php" method="post" class="contact-form" style="margin-top:10px;">
                  <input type="hidden" name="action" value="update">
                  <input type="hidden" name="id" value="<?php echo (int)$p['id']; ?>">
                  <input type="text" name="name" value="<?php echo htmlspecialchars($p['name']); ?>" required>
                  <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($p['price']); ?>" required>
                  <input type="text" name="image_url" value="<?php echo htmlspecialchars($p['image_url']); ?>" required>
                  <input type="text" name="category" value="<?php echo htmlspecialchars($p['category']); ?>" required>
                  <textarea name="description" rows="2"><?php echo htmlspecialchars($p['description'] ?? ''); ?></textarea>
                  <button type="submit">Update</button>
                </form>
                <form action="admin.php" method="post" style="margin-top:6px;">
                  <input type="hidden" name="action" value="delete">
                  <input type="hidden" name="id" value="<?php echo (int)$p['id']; ?>">
                  <button type="submit">Delete</button>
                </form>
              </div>
            <?php } ?>
          </div>
        </div>
      <?php } ?>

    </section>
  </body>
</html>