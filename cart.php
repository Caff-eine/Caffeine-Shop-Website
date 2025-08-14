<?php
require_once __DIR__ . '/connection.php';

// CREATE: add to cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'create') {
  $productId = (int) ($_POST['product_id'] ?? 0);
  if ($productId > 0) {
    // If item exists, increment qty; else insert new
    $check = $conn->prepare('SELECT id, quantity FROM cart_items WHERE product_id = ?');
    $check->bind_param('i', $productId);
    $check->execute();
    $res = $check->get_result();
    if ($row = $res->fetch_assoc()) {
      $newQty = (int)$row['quantity'] + 1;
      $upd = $conn->prepare('UPDATE cart_items SET quantity = ? WHERE id = ?');
      $upd->bind_param('ii', $newQty, $row['id']);
      $upd->execute();
    } else {
      $ins = $conn->prepare('INSERT INTO cart_items (product_id, quantity) VALUES (?, 1)');
      $ins->bind_param('i', $productId);
      $ins->execute();
    }
  }
  header('Location: cart.php');
  exit;
}

// UPDATE: change quantity
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'update') {
  $itemId = (int) ($_POST['item_id'] ?? 0);
  $quantity = max(0, (int) ($_POST['quantity'] ?? 0));
  if ($itemId > 0) {
    if ($quantity === 0) {
      $del = $conn->prepare('DELETE FROM cart_items WHERE id = ?');
      $del->bind_param('i', $itemId);
      $del->execute();
    } else {
      $upd = $conn->prepare('UPDATE cart_items SET quantity = ? WHERE id = ?');
      $upd->bind_param('ii', $quantity, $itemId);
      $upd->execute();
    }
  }
  header('Location: cart.php');
  exit;
}

// DELETE: remove item
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete') {
  $itemId = (int) ($_POST['item_id'] ?? 0);
  if ($itemId > 0) {
    $del = $conn->prepare('DELETE FROM cart_items WHERE id = ?');
    $del->bind_param('i', $itemId);
    $del->execute();
  }
  header('Location: cart.php');
  exit;
}

// READ: show cart
$sql = 'SELECT ci.id AS cart_item_id, ci.quantity, p.id AS product_id, p.name, p.price, p.image_url
        FROM cart_items ci
        JOIN products p ON p.id = ci.product_id
        ORDER BY ci.id ASC';
$result = $conn->query($sql);

$items = [];
$total = 0.0;
while ($row = $result->fetch_assoc()) {
  $items[] = $row;
  $total += ((float)$row['price']) * ((int)$row['quantity']);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart - Caffeine</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  </head>
  <body>
    <header class="header">
      <img class="logo" src="Images/logo.png"/>
      <nav class="navbar">
        <a href="index.php#HOME">HOME</a>
        <a href="index.php#ABOUT">ABOUT US</a>
        <a href="index.php#MENU">MENU</a>
        <a href="index.php#PRODUCTS">OTHER PRODUCTS</a>
        <a href="index.php#CONTACT">CONTACT US</a>
      </nav>
    </header>

    <section class="menu">
      <h1 class="heading">Your Cart</h1>
      <div class="box-container">
        <?php if (empty($items)) { ?>
          <p>Your cart is empty.</p>
        <?php } else { ?>
          <?php foreach ($items as $item) { ?>
            <div class="box cart-item">
              <img class="cart-item-image" src="<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
              <h3><?php echo htmlspecialchars($item['name']); ?></h3>
              <div class="price">$<?php echo number_format((float)$item['price'], 2); ?></div>
              <form action="cart.php" method="post" style="margin-top:10px;">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="item_id" value="<?php echo (int)$item['cart_item_id']; ?>">
                <input type="number" name="quantity" min="0" value="<?php echo (int)$item['quantity']; ?>" style="width:80px;">
                <button type="submit" class="btn">Update</button>
              </form>
              <form action="cart.php" method="post" style="margin-top:6px;">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="item_id" value="<?php echo (int)$item['cart_item_id']; ?>">
                <button type="submit" class="btn">Remove</button>
              </form>
            </div>
          <?php } ?>
          <div id="cart-total" style="margin-top: 20px;">
            <strong>Total: $<?php echo number_format($total, 2); ?></strong>
          </div>
        <?php } ?>
      </div>
    </section>
  </body>
</html>