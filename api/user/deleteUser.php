<?php

require_once dirname(__DIR__) . "/loadEnv.php";
require_once dirname(__DIR__, 2) . "/models/UserModel.php";

$id_gamer = $_SESSION["user_id"] ?? null;

if (!$id_gamer) {
    header("Location: ./../profile");
    return;
}

deleteUser($id_gamer);
session_destroy();
header("Location: ./../../login");
exit();
