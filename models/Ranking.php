<?php

require_once __DIR__ . '/../Models/Database.php';

function getRankingData() {
    global $db;

    $query = $db->query('SELECT name_gamer, MAX(number_hours_game), name_game 
                         FROM gamer 
                         JOIN library ON gamer.id_gamer = library.id_gamer 
                         JOIN game ON library.id_game = game.id_game
                         WHERE number_hours_game = (
                            SELECT MAX(number_hours_game) 
                            FROM library 
                            WHERE library.id_gamer = gamer.id_gamer
                            )
                         GROUP BY gamer.id_gamer 
                         ORDER BY MAX(number_hours_game) DESC');

    $data = $query->fetchAll(PDO::FETCH_ASSOC);

    return $data;
}


