<?php
require_once __DIR__ . '/db.php';

function format_price(float $price): string {
  return number_format($price, 2);
}

function fetch_products_by_category(PDO $pdo, string $category): array {
  $stmt = $pdo->prepare('SELECT id, name, price, image_url, category, description FROM products WHERE category = :category ORDER BY id ASC');
  $stmt->execute([':category' => $category]);
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function fetch_all_products(PDO $pdo): array {
  $stmt = $pdo->query('SELECT id, name, price, image_url, category, description FROM products ORDER BY id ASC');
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function fetch_product_by_id(PDO $pdo, int $id): ?array {
  $stmt = $pdo->prepare('SELECT id, name, price, image_url, category, description FROM products WHERE id = :id');
  $stmt->execute([':id' => $id]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  return $row ? $row : null;
}