<?php

$search = $_GET['search'] ?? null;

if (session_status() == PHP_SESSION_NONE) {
  require_once dirname(__DIR__) . '/views/401.php';
  return;
}

require_once dirname(__DIR__) . '/models/GameModel.php';

$games = getGamesByUserIdNotAndSearch($_SESSION["user_id"], $search);

require_once dirname(__DIR__) . '/views/LibraryView.php';