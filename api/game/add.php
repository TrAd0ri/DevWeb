<?php

require_once dirname(__DIR__) . "/loadEnv.php";
require_once dirname(__DIR__, 2) . "/models/GameModel.php";

$id_gamer = $_SESSION["user_id"] ?? null;
$name = $_POST["name"] ?? null;
$editor = $_POST["editor"] ?? null;
$released_date = $_POST["released_date"] ?? null;
$platforms = $_POST["platforms"] ?? null;
$description = $_POST["description"] ?? null;
$url_image = $_POST["url_image"] ?? null;
$url_site = $_POST["url_site"] ?? null;

if (!$id_gamer || !$name || !$editor || !$released_date || !$platforms || !$description || !$url_image || !$url_site) {
  header("Location: ../../add-game?error=true");
  return;
}

try {
  $id_game = createGameWithPlatforms($name, $editor, $released_date, $description, $url_image, $url_site, $platforms);
  addGameToUserLibrary($id_game, $id_gamer);

  header("Location: ../../game?id=$id_game");
} catch (Exception $e) {
  header("Location: ../../add-game?error=true");
  return;
}
