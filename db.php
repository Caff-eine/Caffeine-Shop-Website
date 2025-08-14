<?php
require_once __DIR__ . '/config.php';

function get_db(): PDO {
  static $pdo = null;
  if ($pdo !== null) {
    return $pdo;
  }
  $dbDir = dirname(DB_PATH);
  if (!is_dir($dbDir)) {
    mkdir($dbDir, 0775, true);
  }
  $pdo = new PDO('sqlite:' . DB_PATH);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec('PRAGMA foreign_keys = ON;');
  return $pdo;
}