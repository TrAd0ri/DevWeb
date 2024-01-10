<?php
require_once dirname(__DIR__) . "/api/loadEnv.php";
require_once dirname(__DIR__, 2) . "/JEULAND-game_collection/models/UserModel.php";

session_start();

$name = $_POST['name'] ?? null;
$firstName = $_POST['firstName'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$passwordConfirm = $_POST['passwordConfirm'] ?? null;

if ($name && $firstName && $email && $password && $passwordConfirm) {
    if (!$password && !$passwordConfirm) {
        header("Location: ./../profile?edit=true&error=true");
        return;
    }
    updateUser($_SESSION['user_id'], $email, $password, $firstName, $name);

    $_SESSION['user_name'] = $name;
    $_SESSION['user_surname'] = $firstName; 
    $_SESSION['user_email'] = $email;

    header("Location: ./../profile");
} else {
    header("Location: ./../profile?edit=true&error=true");
}
