<?php

session_start();
if (!isset($_SESSION["user_id"])) {
  header("Location: ./login");
  return;
}

require_once dirname(__DIR__) . '/models/UserModel.php';

require_once dirname(__DIR__) . '/views/HomeView.php';