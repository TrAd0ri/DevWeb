<?php
if (!isset($_SESSION["user_id"])) {
  require_once dirname(__DIR__) . '/views/401.php';
  return;
}

require_once dirname(__DIR__) . '/models/UserModel.php';
require_once dirname(__DIR__) . '/models/Ranking.php';

$data = getRankingData();

require_once dirname(__DIR__) . "/views/RankingView.php";