<?php
require_once __DIR__ . '/connection.php';

$drinks = $conn->query("SELECT id, name, price, image_url FROM products WHERE category='drink' ORDER BY id ASC");
$gear   = $conn->query("SELECT id, name, price, image_url FROM products WHERE category='gear' ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caffeine</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  </head>
  <body>
    <header class="header">
      <img class="logo" src="Images/logo.png"/>
      <nav class="navbar">
        <a href="#HOME">HOME</a>
        <a href="#ABOUT">ABOUT US</a>
        <a href="#MENU">MENU</a>
        <a href="#PRODUCTS">OTHER PRODUCTS</a>
        <a href="#CONTACT">CONTACT US</a>
        <a id="cart-icon" href="cart.php"><i class="fas fa-shopping-cart"></i></a>
      </nav>
    </header>

    <section id="HOME" class="home-section">
      <div class="content">
        <h2>It's All About Coffee</h2>
        <p>Savor the rich aroma and bold flavors of our handcrafted brews.</p>
        <a id="order-now-button" class="btn" href="#MENU">Order Now</a>
      </div>
    </section>

    <section id="ABOUT" class="about">
      <h1 class="heading">About us</h1>
      <div class="row">
        <div class="image">
          <img src="Images/about.png" alt="">
        </div>
        <div class="content">
          <h3>Caffeine: Where Coffee Addicts Unite</h3>
          <p>Welcome to Caffeine, your go-to hub for coffee lovers! From premium beans to brewing gear and delicious treats, indulge your passion for all things caffeine with us!</p>
        </div>
      </div>
    </section>

    <section id="MENU" class="menu">
      <h1 class="heading">Menu</h1>
      <div class="box-container">
        <?php while ($p = $drinks->fetch_assoc()) { ?>
          <div class="box">
            <img src="<?php echo htmlspecialchars($p['image_url']); ?>" alt="">
            <h3><?php echo htmlspecialchars($p['name']); ?></h3>
            <div class="price">$<?php echo number_format((float)$p['price'], 2); ?></div>
            <form action="cart.php" method="post">
              <input type="hidden" name="action" value="create">
              <input type="hidden" name="product_id" value="<?php echo (int)$p['id']; ?>">
              <button type="submit" class="btn">Add to Cart</button>
            </form>
          </div>
        <?php } ?>
      </div>
    </section>

    <section id="PRODUCTS" class="menu">
      <h1 class="heading">Products</h1>
      <div class="box-container">
        <?php while ($p = $gear->fetch_assoc()) { ?>
          <div class="box">
            <img src="<?php echo htmlspecialchars($p['image_url']); ?>" alt="">
            <h3><?php echo htmlspecialchars($p['name']); ?></h3>
            <div class="price">$<?php echo number_format((float)$p['price'], 2); ?></div>
            <form action="cart.php" method="post">
              <input type="hidden" name="action" value="create">
              <input type="hidden" name="product_id" value="<?php echo (int)$p['id']; ?>">
              <button type="submit" class="btn">Add to Cart</button>
            </form>
          </div>
        <?php } ?>
      </div>
    </section>

    <section id="CONTACT" class="contact-section">
      <h1 class="heading">Contact us</h1>
      <div class="contact-container">
        <p class="text">Got questions? We'd love to hear from you. Send us a message!</p>
        <form action="#" method="post" class="contact-form">
          <input type="text" name="name" placeholder="Your Name" required>
          <input type="email" name="email" placeholder="Your Email" required>
          <input type="text" name="subject" placeholder="Subject" required>
          <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
          <button type="submit">Send Message</button>
        </form>
      </div>
    </section>
  </body>
</html>