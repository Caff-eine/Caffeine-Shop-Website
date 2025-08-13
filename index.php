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
      <h1 class="heading">about us</h1>
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
      <h1 class="heading">menu</h1>
      <div class="box-container">
        <div class="box">
          <img src="Images/menu1.png" alt="">
          <h3>Cortado</h3>
          <div class="price">$3.99</div>
          <form action="cart.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="name" value="Cortado">
            <input type="hidden" name="price" value="3.99">
            <input type="hidden" name="image_url" value="Images/menu1.png">
            <button type="submit" class="btn">Add to Cart</button>
          </form>
        </div>
        
        
    
        <div class="box">
          <img src="Images/menu2.png" alt="">
          <h3>Cappuccino</h3>
          <div class="price">$3.99</div>
          <form action="cart.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="name" value="Cappuccino">
            <input type="hidden" name="price" value="3.99">
            <input type="hidden" name="image_url" value="Images/menu2.png">
            <button type="submit" class="btn">Add to Cart</button>
          </form>
        </div>

        
    
        <div class="box">
          <img src="Images/menu3.png" alt="">
          <h3>Drip Coffee</h3>
          <div class="price">$2.99</div>
          <form action="cart.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="name" value="Drip Coffee">
            <input type="hidden" name="price" value="2.99">
            <input type="hidden" name="image_url" value="Images/menu3.png">
            <button type="submit" class="btn">Add to Cart</button>
          </form>
        </div>
    
        <div class="box">
          <img src="Images/menu4.png" alt="">
          <h3>Cold Brew</h3>
          <div class="price">$3.99</div>
          <form action="cart.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="name" value="Cold Brew">
            <input type="hidden" name="price" value="3.99">
            <input type="hidden" name="image_url" value="Images/menu4.png">
            <button type="submit" class="btn">Add to Cart</button>
          </form>
        </div>
    
        <div class="box">
          <img src="Images/menu5.png" alt="">
          <h3>Latte</h3>
          <div class="price">$4.99</div>
          <form action="cart.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="name" value="Latte">
            <input type="hidden" name="price" value="4.99">
            <input type="hidden" name="image_url" value="Images/menu5.png">
            <button type="submit" class="btn">Add to Cart</button>
          </form>
        </div>
    
        <div class="box">
          <img src="Images/menu6.png" alt="">
          <h3>Espresso Shot</h3>
          <div class="price">$2.99</div>
          <form action="cart.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="name" value="Espresso Shot">
            <input type="hidden" name="price" value="2.99">
            <input type="hidden" name="image_url" value="Images/menu6.png">
            <button type="submit" class="btn">Add to Cart</button>
          </form>
        </div>
    
        <div class="box">
          <img src="Images/menu7.png" alt="">
          <h3>Flat White</h3>
          <div class="price">$4.99</div>
          <form action="cart.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="name" value="Flat White">
            <input type="hidden" name="price" value="4.99">
            <input type="hidden" name="image_url" value="Images/menu7.png">
            <button type="submit" class="btn">Add to Cart</button>
          </form>
        </div>
    
        <div class="box">
          <img src="Images/menu8.png" alt="">
          <h3>Iced Latte</h3>
          <div class="price">$4.99</div>
          <form action="cart.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="name" value="Iced Latte">
            <input type="hidden" name="price" value="4.99">
            <input type="hidden" name="image_url" value="Images/menu8.png">
            <button type="submit" class="btn">Add to Cart</button>
          </form>
        </div>
    
        <div class="box">
          <img src="Images/menu9.png" alt="">
          <h3>Americano</h3>
          <div class="price">$3.99</div>
          <form action="cart.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="name" value="Americano">
            <input type="hidden" name="price" value="3.99">
            <input type="hidden" name="image_url" value="Images/menu9.png">
            <button type="submit" class="btn">Add to Cart</button>
          </form>
        </div>
        <div class="box">
          <img src="Images/menu10.jpg" alt="">
          <h3>Iced Mocha</h3>
          <div class="price">$3.99</div>
          <form action="cart.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="name" value="Iced Mocha">
            <input type="hidden" name="price" value="3.99">
            <input type="hidden" name="image_url" value="Images/menu10.jpg">
            <button type="submit" class="btn">Add to Cart</button>
          </form>
        </div>
        <div class="box">
          <img src="Images/menu11.png" alt="">
          <h3>Nitro Cold Brew
          </h3>
          <div class="price">$4.99</div>
          <form action="cart.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="name" value="Nitro Cold Brew">
            <input type="hidden" name="price" value="4.99">
            <input type="hidden" name="image_url" value="Images/menu11.png">
            <button type="submit" class="btn">Add to Cart</button>
          </form>
        </div>
        <div class="box">
          <img src="Images/menu12.png" alt="">
          <h3>Macchiato</h3>
          <div class="price">$3.99</div>
          <form action="cart.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="name" value="Macchiato">
            <input type="hidden" name="price" value="3.99">
            <input type="hidden" name="image_url" value="Images/menu12.png">
                         <button type="submit" class="btn">Add to Cart</button>
          </form>
        </div>
             </div>
     </section>

     <section id="PRODUCTS" class="menu">
      <h1 class="heading">PRODUCTS</h1>
      <div class="box-container">
        <div class="box">
          <img src="Images/product1.png" alt="">
          <h3>Mag warmer</h3>
          <div class="price">$19.99</div>
          <form action="cart.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="name" value="Mag warmer">
            <input type="hidden" name="price" value="19.99">
            <input type="hidden" name="image_url" value="Images/product1.png">
            <button type="submit" class="btn">Add to Cart</button>
          </form>
        </div>
    
        <div class="box">
          <img src="Images/product2.jpg" alt="">
          <h3>Drip coffee machine </h3>
          <div class="price">$79.99</div>
          <form action="cart.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="name" value="Drip coffee machine">
            <input type="hidden" name="price" value="79.99">
            <input type="hidden" name="image_url" value="Images/product2.jpg">
            <button type="submit" class="btn">Add to Cart</button>
          </form>
        </div>
       
    
        <div class="box">
          <img src="Images/product3.png" alt="">
          <h3>Electric coffee grinder</h3>
          <div class="price">$23.99</div>
          <form action="cart.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="name" value="Electric coffee grinder">
            <input type="hidden" name="price" value="23.99">
            <input type="hidden" name="image_url" value="Images/product3.png">
            <button type="submit" class="btn">Add to Cart</button>
          </form>
        </div>
    
        <div class="box">
          <img src="Images/product4.jpg" alt="">
          <h3>Coffee press</h3>
          <div class="price">$19.99</div>
          <form action="cart.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="name" value="Coffee press">
            <input type="hidden" name="price" value="19.99">
            <input type="hidden" name="image_url" value="Images/product4.jpg">
            <button type="submit" class="btn">Add to Cart</button>
          </form>
        </div>
        <div class="box">
          <img src="Images/product5.png" alt="">
          <h3>Drink shaker</h3>
          <div class="price">$9.99</div>
          <form action="cart.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="name" value="Drink shaker">
            <input type="hidden" name="price" value="9.99">
            <input type="hidden" name="image_url" value="Images/product5.png">
            <button type="submit" class="btn">Add to Cart</button>
          </form>
        </div>
    
        <div class="box">
          <img src="Images/product6.jpg" alt="">
          <h3>Coffee roasters</h3>
          <div class="price">$99.99</div>
          <form action="cart.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="name" value="Coffee roasters">
            <input type="hidden" name="price" value="99.99">
            <input type="hidden" name="image_url" value="Images/product6.jpg">
            <button type="submit" class="btn">Add to Cart</button>
          </form>
        </div>
    
        <div class="box">
          <img src="Images/product7.png" alt="">
          <h3>Italian Coffee Maker</h3>
          <div class="price">$49.99</div>
          <form action="cart.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="name" value="Italian Coffee Maker">
            <input type="hidden" name="price" value="49.99">
            <input type="hidden" name="image_url" value="Images/product7.png">
            <button type="submit" class="btn">Add to Cart</button>
          </form>
        </div>
        <div class="box">
          <img src="Images/product8.png" alt="">
          <h3>Travel Coffee Mug</h3>
          <div class="price">$14.99</div>
          <form action="cart.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="name" value="Travel Coffee Mug">
            <input type="hidden" name="price" value="14.99">
            <input type="hidden" name="image_url" value="Images/product8.png">
            <button type="submit" class="btn">Add to Cart</button>
          </form>
        </div>
        <div class="box">
          <img src="Images/product9.png" alt="">
          <h3>6 Coffee Mugs</h3>
          <div class="price">$19.99</div>
          <form action="cart.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="name" value="6 Coffee Mugs">
            <input type="hidden" name="price" value="19.99">
            <input type="hidden" name="image_url" value="Images/product9.png">
            <button type="submit" class="btn">Add to Cart</button>
          </form>
        </div>
        <div class="box">
          <img src="Images/product10.png" alt="">
          <h3>Glass Coffee Filter</h3> 
          <div class="price">$14.99</div>
          <form action="cart.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="name" value="Glass Coffee Filter">
            <input type="hidden" name="price" value="14.99">
            <input type="hidden" name="image_url" value="Images/product10.png">
            <button type="submit" class="btn">Add to Cart</button>
          </form>
        </div>
        <div class="box">
          <img src="Images/product11.png" alt="">
          <h3>Our Special Coffee Beans</h3>
          <div class="price">$7.99</div>
          <form action="cart.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="name" value="Our Special Coffee Beans">
            <input type="hidden" name="price" value="7.99">
            <input type="hidden" name="image_url" value="Images/product11.png">
            <button type="submit" class="btn">Add to Cart</button>
          </form>
        </div>
        <div class="box">
          <img src="Images/product12.png" alt="">
          <h3>4 in 1 Coffee Steamer and Frother</h3>
          <div class="price">$39.99</div>
          <form action="cart.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="name" value="4 in 1 Coffee Steamer and Frother">
            <input type="hidden" name="price" value="39.99">
            <input type="hidden" name="image_url" value="Images/product12.png">
            <button type="submit" class="btn">Add to Cart</button>
          </form>
        </div>
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