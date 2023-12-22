<?php

require_once __DIR__ . '/../Models/Database.php';

function getGameById($id)
{
  global $db;

  $query = $db->prepare('SELECT * FROM game WHERE id_game = :id');
  $query->execute(['id' => $id]);

  $game = $query->fetch();
  return formatGame($game);
}

function getGamesByUserId($id)
{
  global $db;

  $query = $db->prepare('SELECT * FROM game LEFT JOIN library ON game.id_game = library.id_game WHERE library.id_gamer = :id');
  $query->execute(['id' => $id]);

  $games = $query->fetchAll();
  return formatGames($games);
}

function getGamesByUserIdNot($id)
{
  global $db;

  $query = $db->prepare('SELECT * FROM game LEFT JOIN library ON game.id_game = library.id_game WHERE library.id_gamer IS NULL OR library.id_gamer != :id');
  $query->execute(['id' => $id]);

  $games = $query->fetchAll();
  return formatGames($games);
}

function getGamesByUserIdNotAndSearch($id, $search)
{
  global $db;

  $query = $db->prepare('SELECT * FROM game LEFT JOIN library ON game.id_game = library.id_game WHERE (library.id_gamer IS NULL OR library.id_gamer != :id) AND (game.name_game LIKE :search OR game.editor_game LIKE :search OR game.type_game LIKE :search)');
  $query->execute([
    'id' => $id,
    'search' => '%' . $search . '%',
  ]);

  $games = $query->fetchAll();
  return formatGames($games);
}


function createGame($name, $editor, $release_date, $type, $description, $url_image, $url_website)
{
  global $db;

  $query = $db->prepare('INSERT INTO game (name_game, editor_game, released_game, type_game, description_game, URL_cover_game, URL_site_game) VALUES (:name, :editor, :release_date, :type, :description, :url_image, :url_website)');
  $query->execute([
    'name' => $name,
    'editor' => $editor,
    'release_date' => $release_date,
    'type' => $type,
    'description' => $description,
    'url_image' => $url_image,
    'url_website' => $url_website,
  ]);

  return getGameById($db->lastInsertId());
}

function updateGame($id, $name, $editor, $release_date, $type, $description, $url_image, $url_website)
{
  global $db;

  $query = $db->prepare('UPDATE game SET name_game = :name, editor_game = :editor, released_game = :release_date, type_game = :type, description_game = :description, URL_cover_game = :url_image, URL_site_game = :url_website WHERE id_game = :id');
  $query->execute([
    'id' => $id,
    'name' => $name,
    'editor' => $editor,
    'release_date' => $release_date,
    'type' => $type,
    'description' => $description,
    'url_image' => $url_image,
    'url_website' => $url_website,
  ]);

  return getGameById($id);
}

function deleteGame($id)
{
  global $db;

  $query = $db->prepare('DELETE FROM game WHERE id_game = :id');
  $query->execute(['id' => $id]);

  return $query->rowCount() > 0;
}

function formatGame($game)
{
  return [
    'id' => $game['id_game'] ?? null,
    'name' => $game['name_game'] ?? null,
    'editor' => $game['editor_game'] ?? null,
    'released_date' => $game['released_game'] ?? null,
    'type' => $game['type_game'] ?? null,
    'description' => $game['description_game'] ?? null,
    'url_image' => $game['URL_cover_game'] ?? null,
    'url_website' => $game['URL_site_game'] ?? null,
  ];
}

function formatGames($games)
{
  $formattedGames = [];
  foreach ($games as $game) {
    $formattedGames[] = formatGame($game);
  }
  return $formattedGames;
}