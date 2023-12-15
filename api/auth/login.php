<?php
require_once dirname(__DIR__, 2) . "/src/Services/UserService.php";

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