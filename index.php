<?php
require_once __DIR__ . '/functions.php';
$pdo = get_db();
$drinks = fetch_products_by_category($pdo, 'drink');
$gear = fetch_products_by_category($pdo, 'gear');
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
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
        <p>
          Savor the rich aroma and bold flavors of our handcrafted brews. 
          From the first sip to the last drop, experience the true essence of coffee bliss with each cup from Caffeine.
        </p>
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
          <p>Welcome to Caffeine, your go-to hub for coffee lovers! 
            Whether you're craving a perfectly brewed cup of joe or searching for top-notch coffee accessories and equipment, we've got you covered.
             From premium beans to brewing gear and delicious treats, indulge your passion for all things caffeine with us!</p>
        </div>      
      </div>
    </section>



    <section id="MENU" class="menu">
      <h1 class="heading">Menu</h1>
      <div class="box-container">
        <?php foreach ($drinks as $product) { ?>
          <div class="box">
            <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="">
            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
            <div class="price">$<?php echo format_price((float)$product['price']); ?></div>
            <form action="cart.php" method="post">
              <input type="hidden" name="action" value="add">
              <input type="hidden" name="product_id" value="<?php echo (int)$product['id']; ?>">
              <button type="submit" class="btn">Add to Cart</button>
            </form>
          </div>
        <?php } ?>
      </div>
      </section>



    <section id="PRODUCTS" class="menu">
      <h1 class="heading">Products</h1>
      <div class="box-container">
        <?php foreach ($gear as $product) { ?>
          <div class="box">
            <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="">
            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
            <div class="price">$<?php echo format_price((float)$product['price']); ?></div>
            <form action="cart.php" method="post">
              <input type="hidden" name="action" value="add">
              <input type="hidden" name="product_id" value="<?php echo (int)$product['id']; ?>">
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
        <div class="contact-info">
          <p>Email: <a href="caffeineShop@gmail.com">caffeineShop@gmail.com</a></p>
          <p>Phone: +961 70754267</p>
          <div class="social-links">
            <a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>