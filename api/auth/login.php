<?php
use Symfony\Component\Dotenv\Dotenv;

$dir = dirname(__DIR__, 2);
require_once $dir . '/vendor/autoload.php';
$dotenv = new Dotenv();
$dotenv->load($dir . '/.env');

require_once $dir . "/models/UserModel.php";

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

if ($email && $password) {
  $user = getUserByEmail($email);

  if (!$user) {
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
  $_SESSION["user_surname "] = $user['surname'];
  $_SESSION["user_email"] = $user['email'];

  header("Location: ./../../");
} else {
  header("Location: ../../login?error=true");
}
