-- Create database (run only once)
CREATE DATABASE IF NOT EXISTS caffeine_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE caffeine_db;

-- Products table
CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  image_url VARCHAR(500) NOT NULL,
  category ENUM('drink','gear') NOT NULL,
  description TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Seed products
INSERT INTO products (name, price, image_url, category, description) VALUES
('Cortado', 3.99, 'Images/menu1.png', 'drink', 'Espresso cut with warm milk.'),
('Cappuccino', 3.99, 'Images/menu2.png', 'drink', 'Classic espresso with steamed milk and foam.'),
('Drip Coffee', 2.99, 'Images/menu3.png', 'drink', 'Smooth, balanced drip coffee.'),
('Cold Brew', 3.99, 'Images/menu4.png', 'drink', 'Slow-steeped, bold and refreshing.'),
('Latte', 4.99, 'Images/menu5.png', 'drink', 'Espresso with steamed milk, silky smooth.'),
('Espresso Shot', 2.99, 'Images/menu6.png', 'drink', 'Rich, aromatic shot of espresso.'),
('Flat White', 4.99, 'Images/menu7.png', 'drink', 'Velvety microfoam and bold espresso.'),
('Iced Latte', 4.99, 'Images/menu8.png', 'drink', 'Chilled latte over ice.'),
('Americano', 3.99, 'Images/menu9.png', 'drink', 'Espresso topped with hot water.'),
('Iced Mocha', 3.99, 'Images/menu10.jpg', 'drink', 'Chocolatey, chilled mocha.'),
('Nitro Cold Brew', 4.99, 'Images/menu11.png', 'drink', 'Creamy nitrogen-infused cold brew.'),
('Macchiato', 3.99, 'Images/menu12.png', 'drink', 'Espresso marked with foam.'),
('Mag warmer', 19.99, 'Images/product1.png', 'gear', 'Keep your mug warm for hours.'),
('Drip coffee machine', 79.99, 'Images/product2.jpg', 'gear', 'Automatic drip coffee maker.'),
('Electric coffee grinder', 23.99, 'Images/product3.png', 'gear', 'Fresh grounds, every time.'),
('Coffee press', 19.99, 'Images/product4.jpg', 'gear', 'Classic french press brewing.'),
('Drink shaker', 9.99, 'Images/product5.png', 'gear', 'Mix your drinks like a pro.'),
('Coffee roasters', 99.99, 'Images/product6.jpg', 'gear', 'Roast beans to perfection.'),
('Italian Coffee Maker', 49.99, 'Images/product7.png', 'gear', 'Stovetop espresso maker.'),
('Travel Coffee Mug', 14.99, 'Images/product8.png', 'gear', 'Insulated mug for travel.'),
('6 Coffee Mugs', 19.99, 'Images/product9.png', 'gear', 'Set of six classic mugs.'),
('Glass Coffee Filter', 14.99, 'Images/product10.png', 'gear', 'Reusable glass filter.'),
('Our Special Coffee Beans', 7.99, 'Images/product11.png', 'gear', 'Premium house blend beans.'),
('4 in 1 Coffee Steamer and Frother', 39.99, 'Images/product12.png', 'gear', 'Steam and froth like a barista.');

-- Cart items table (very simple, one global cart for demo)
CREATE TABLE IF NOT EXISTS cart_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product_id INT NOT NULL,
  quantity INT NOT NULL DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);