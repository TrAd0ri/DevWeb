<?php

try {
  global $db;

  $db_driver = $_ENV['DB_DRIVER'];
  $db_host = $_ENV['DB_HOST'];
  $db_user = $_ENV['DB_USER'];
  $db_pass = $_ENV['DB_PASSWORD'];
  $db_name = $_ENV['DB_NAME'];

  $db = new PDO("$db_driver:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch (PDOException $e) {
  echo 'Connexion échouée : ' . $e->getMessage();
}