<?php

require_once dirname(__DIR__) . "/loadEnv.php";
require_once dirname(__DIR__, 2) . "/models/UserModel.php";

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

if (!$email || !$password) {
  header("Location: ../../login?error=true");
  return;
}

try {
  $user = getUserByEmail($email);
  if (!$user)
    throw new Exception();
} catch (Exception $e) {
  header("Location: ../../login?error=true");
  return;
}

if (!password_verify($password, $user['password'])) {
  header("Location: ../../login?error=true");
  return;
}

session_start();
$_SESSION["user_id"] = $user['id'];
$_SESSION["user_name"] = $user['name'];
$_SESSION["user_surname"] = $user['surname'];
$_SESSION["user_email"] = $user['email'];

header("Location: ./../../");
