<?php

require_once __DIR__ . '/../Models/Database.php';

function getUserByEmail($email)
{
  global $db;

  $query = $db->prepare('SELECT * FROM users WHERE email = :email');
  $query->execute(['email' => $email]);

  return $query->fetch();
}

