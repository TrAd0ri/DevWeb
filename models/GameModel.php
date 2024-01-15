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

  $query = $db->prepare('SELECT game.*, number_hours_game FROM game LEFT JOIN library ON game.id_game = library.id_game WHERE library.id_gamer = :id');
  $query->execute(['id' => $id]);

  $games = $query->fetchAll();
  return formatGames($games);
}

function getGamesByUserIdNot($id)
{
  global $db;

  $query = $db->prepare('SELECT game.* FROM game LEFT JOIN library ON game.id_game = library.id_game WHERE library.id_gamer IS NULL OR library.id_gamer != :id');
  $query->execute(['id' => $id]);

  $games = $query->fetchAll();
  return formatGames($games);
}

function getGamesByUserIdNotAndSearch($id, $search)
{
  global $db;

  $query = $db->prepare('SELECT game.* FROM game WHERE NOT EXISTS (SELECT 1 FROM library WHERE library.id_game = game.id_game AND library.id_gamer = :id) AND (game.name_game LIKE :search OR game.editor_game LIKE :search)');
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

function addGameToUserLibrary($id_game, $id_gamer)
{
  global $db;

  $query = $db->prepare('INSERT INTO library (id_game, id_gamer) VALUES (:id_game, :id_gamer)');
  $query->execute([
    'id_game' => $id_game,
    'id_gamer' => $id_gamer,
  ]);

  return getGameById($id_game);
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

function changeHoursPlayed($id_game, $id_gamer, $hours)
{
  global $db;

  $query = $db->prepare('UPDATE library SET number_hours_game = :hours WHERE id_game = :id_game AND id_gamer = :id_gamer');
  $query->execute([
    'id_game' => $id_game,
    'id_gamer' => $id_gamer,
    'hours' => $hours,
  ]);
}

function deleteGame($id)
{
  global $db;

  $query = $db->prepare('DELETE FROM game WHERE id_game = :id');
  $query->execute(['id' => $id]);

  return $query->rowCount() > 0;
}

function deleteGameFromUserLibrary($id_game, $id_gamer)
{
  global $db;

  $query = $db->prepare('DELETE FROM library WHERE id_game = :id_game AND id_gamer = :id_gamer');
  $query->execute([
    'id_game' => $id_game,
    'id_gamer' => $id_gamer,
  ]);

  return $query->rowCount() > 0;
}

function verifyIfUserHasGameAndReturn($id_game, $id_gamer)
{
  global $db;

  $query = $db->prepare('SELECT game.*, number_hours_game FROM library JOIN game ON game.id_game = library.id_game WHERE library.id_game = :id_game AND id_gamer = :id_gamer');
  $query->execute([
    'id_game' => $id_game,
    'id_gamer' => $id_gamer,
  ]);

  $game = $query->fetch();
  return formatGame($game);
}

function getPlatformFromGame($id)
{
  global $db;

  $query = $db->prepare('SELECT name_platform as name FROM platform WHERE id_game = :id');
  $query->execute(['id' => $id]);

  $platforms = $query->fetchAll();

  $formattedPlatforms = [];
  foreach ($platforms as $platform) {
    $formattedPlatforms[] = $platform['name'];
  }

  return $formattedPlatforms;
}

function formatGame($game)
{
  if (!is_array($game)) {
    return null;
  }

  return [
    'id' => $game['id_game'] ?? null,
    'name' => $game['name_game'] ?? null,
    'editor' => $game['editor_game'] ?? null,
    'released_date' => $game['released_game'] ?? null,
    'description' => $game['description_game'] ?? null,
    'url_image' => $game['URL_cover_game'] ?? null,
    'url_website' => $game['URL_site_game'] ?? null,
    'hoursPlayed' => $game['number_hours_game'] ?? 0,
    'platforms' => getPlatformFromGame($game['id_game']) ?? null,
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
