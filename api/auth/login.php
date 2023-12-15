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

  var_dump($user);
  //   header("Location: ./../index.php");
// } else {
//   header("Location: ./../index.php?error=true");
// }
}