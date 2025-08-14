<?php
require_once __DIR__ . '/db.php';

$pdo = get_db();

$pdo->exec('CREATE TABLE IF NOT EXISTS products (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name TEXT NOT NULL,
  price REAL NOT NULL,
  image_url TEXT NOT NULL,
  category TEXT NOT NULL CHECK (category IN ("drink", "gear")),
  description TEXT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);');

$count = (int) $pdo->query('SELECT COUNT(*) FROM products')->fetchColumn();
if ($count === 0) {
  $products = [
    // Drinks
    ['Cortado', 3.99, 'Images/menu1.png', 'drink', 'Espresso cut with warm milk.'],
    ['Cappuccino', 3.99, 'Images/menu2.png', 'drink', 'Classic espresso with steamed milk and foam.'],
    ['Drip Coffee', 2.99, 'Images/menu3.png', 'drink', 'Smooth, balanced drip coffee.'],
    ['Cold Brew', 3.99, 'Images/menu4.png', 'drink', 'Slow-steeped, bold and refreshing.'],
    ['Latte', 4.99, 'Images/menu5.png', 'drink', 'Espresso with steamed milk, silky smooth.'],
    ['Espresso Shot', 2.99, 'Images/menu6.png', 'drink', 'Rich, aromatic shot of espresso.'],
    ['Flat White', 4.99, 'Images/menu7.png', 'drink', 'Velvety microfoam and bold espresso.'],
    ['Iced Latte', 4.99, 'Images/menu8.png', 'drink', 'Chilled latte over ice.'],
    ['Americano', 3.99, 'Images/menu9.png', 'drink', 'Espresso topped with hot water.'],
    ['Iced Mocha', 3.99, 'Images/menu10.jpg', 'drink', 'Chocolatey, chilled mocha.'],
    ['Nitro Cold Brew', 4.99, 'Images/menu11.png', 'drink', 'Creamy nitrogen-infused cold brew.'],
    ['Macchiato', 3.99, 'Images/menu12.png', 'drink', 'Espresso marked with foam.'],
    // Gear
    ['Mag warmer', 19.99, 'Images/product1.png', 'gear', 'Keep your mug warm for hours.'],
    ['Drip coffee machine', 79.99, 'Images/product2.jpg', 'gear', 'Automatic drip coffee maker.'],
    ['Electric coffee grinder', 23.99, 'Images/product3.png', 'gear', 'Fresh grounds, every time.'],
    ['Coffee press', 19.99, 'Images/product4.jpg', 'gear', 'Classic french press brewing.'],
    ['Drink shaker', 9.99, 'Images/product5.png', 'gear', 'Mix your drinks like a pro.'],
    ['Coffee roasters', 99.99, 'Images/product6.jpg', 'gear', 'Roast beans to perfection.'],
    ['Italian Coffee Maker', 49.99, 'Images/product7.png', 'gear', 'Stovetop espresso maker.'],
    ['Travel Coffee Mug', 14.99, 'Images/product8.png', 'gear', 'Insulated mug for travel.'],
    ['6 Coffee Mugs', 19.99, 'Images/product9.png', 'gear', 'Set of six classic mugs.'],
    ['Glass Coffee Filter', 14.99, 'Images/product10.png', 'gear', 'Reusable glass filter.'],
    ['Our Special Coffee Beans', 7.99, 'Images/product11.png', 'gear', 'Premium house blend beans.'],
    ['4 in 1 Coffee Steamer and Frother', 39.99, 'Images/product12.png', 'gear', 'Steam and froth like a barista.'],
  ];

  $stmt = $pdo->prepare('INSERT INTO products (name, price, image_url, category, description) VALUES (:name, :price, :image_url, :category, :description)');
  foreach ($products as $p) {
    $stmt->execute([
      ':name' => $p[0],
      ':price' => $p[1],
      ':image_url' => $p[2],
      ':category' => $p[3],
      ':description' => $p[4],
    ]);
  }
}

echo "Setup complete.\n";