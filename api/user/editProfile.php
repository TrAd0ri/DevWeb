<?php

require_once dirname(__DIR__) . "/loadEnv.php";
require_once dirname(__DIR__, 2) . "/models/UserModel.php";

$name = $_POST['name'] ?? null;
$firstName = $_POST['firstName'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$passwordConfirm = $_POST['passwordConfirm'] ?? null;

if (!$name || !$firstName || !$email || !$password || !$passwordConfirm) {
    header("Location: ./../../profile?edit=true&error=true");
    return;
}
if ($password !== $passwordConfirm) {
    header("Location: ./../../profile?edit=true&error=true");
    return;
}   

try {
    updateUser($_SESSION['user_id'], $email, $password, $firstName, $name);
} catch (Exception $e) {
    header("Location: ./../../profile?edit=true&error=true");
    return;
}

$_SESSION['user_name'] = $name;
$_SESSION['user_surname'] = $firstName;
$_SESSION['user_email'] = $email;

header("Location: ./../../profile");
