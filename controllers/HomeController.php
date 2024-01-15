<?php

if (session_status() == PHP_SESSION_NONE) {
  require_once dirname(__DIR__) . '/views/401.php';
  return;
}

require_once dirname(__DIR__) . '/models/GameModel.php';
require_once dirname(__DIR__) . '/models/UserModel.php';

$games = getGamesByUserId($_SESSION["user_id"]);

require_once dirname(__DIR__) . '/views/HomeView.php';