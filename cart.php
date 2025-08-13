<?php
session_start();

if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

function addItemToCart(string $name, float $price, string $imageUrl): void {
  if (!isset($_SESSION['cart'][$name])) {
    $_SESSION['cart'][$name] = [
      'name' => $name,
      'price' => $price,
      'quantity' => 0,
      'image_url' => $imageUrl,
    ];
  }
  $_SESSION['cart'][$name]['quantity'] += 1;
}

function decrementItem(string $name): void {
  if (isset($_SESSION['cart'][$name])) {
    $_SESSION['cart'][$name]['quantity'] -= 1;
    if ($_SESSION['cart'][$name]['quantity'] <= 0) {
      unset($_SESSION['cart'][$name]);
    }
  }
}

function removeItem(string $name): void {
  if (isset($_SESSION['cart'][$name])) {
    unset($_SESSION['cart'][$name]);
  }
}

function clearCart(): void {
  $_SESSION['cart'] = [];
}

function getCartItems(): array {
  return $_SESSION['cart'];
}

function getCartTotal(): float {
  $total = 0.0;
  foreach (getCartItems() as $item) {
    $total += $item['price'] * $item['quantity'];
  }
  return $total;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = $_POST['action'] ?? '';
  if ($action === 'add') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $price = isset($_POST['price']) ? (float) $_POST['price'] : 0.0;
    $imageUrl = isset($_POST['image_url']) ? trim($_POST['image_url']) : '';
    if ($name !== '' && $price > 0) {
      addItemToCart($name, $price, $imageUrl);
    }
  } elseif ($action === 'decrement') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    if ($name !== '') {
      decrementItem($name);
    }
  } elseif ($action === 'remove') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    if ($name !== '') {
      removeItem($name);
    }
  } elseif ($action === 'clear') {
    clearCart();
  }

  header('Location: cart.php');
  exit;
}

$items = getCartItems();
$total = getCartTotal();
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
              <div class="price">$<?php echo number_format($item['price'], 2); ?></div>
              <div class="quantity">Quantity: <?php echo (int) $item['quantity']; ?></div>
              <div class="actions">
                <form action="cart.php" method="post" style="display:inline-block">
                  <input type="hidden" name="action" value="decrement">
                  <input type="hidden" name="name" value="<?php echo htmlspecialchars($item['name']); ?>">
                  <button type="submit" class="btn">-</button>
                </form>
                <form action="cart.php" method="post" style="display:inline-block">
                  <input type="hidden" name="action" value="add">
                  <input type="hidden" name="name" value="<?php echo htmlspecialchars($item['name']); ?>">
                  <input type="hidden" name="price" value="<?php echo htmlspecialchars($item['price']); ?>">
                  <input type="hidden" name="image_url" value="<?php echo htmlspecialchars($item['image_url']); ?>">
                  <button type="submit" class="btn">+</button>
                </form>
                <form action="cart.php" method="post" style="display:inline-block">
                  <input type="hidden" name="action" value="remove">
                  <input type="hidden" name="name" value="<?php echo htmlspecialchars($item['name']); ?>">
                  <button type="submit" class="btn"><i class="fas fa-trash-alt"></i></button>
                </form>
              </div>
            </div>
          <?php } ?>
          <div id="cart-total" style="margin-top: 20px;">
            <strong>Total: $<?php echo number_format($total, 2); ?></strong>
          </div>
          <div style="margin-top: 10px;">
            <form action="cart.php" method="post" style="display:inline-block">
              <input type="hidden" name="action" value="clear">
              <button type="submit" class="btn">Clear Cart</button>
            </form>
            <a href="index.php#MENU" class="btn" style="margin-left:10px;">Continue Shopping</a>
          </div>
        <?php } ?>
      </div>
    </section>
  </body>
</html>