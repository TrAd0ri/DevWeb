<?php
require_once dirname(__DIR__) . "/api/loadEnv.php";
require_once dirname(__DIR__, 2) . "/JEULAND-game_collection/models/UserModel.php";

session_start();

if ($_SESSION['user_id']) {
    deleteUser($_SESSION['user_id']);
    session_destroy();
    header("Location: ./../login");
    exit();
} else {
    header("Location: ./../profile");
}
