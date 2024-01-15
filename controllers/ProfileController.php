<?php
$isError = $_GET['error'] == 'true' ? true : false;
$isEdit = isset($_GET['edit']) == 'true' ? true : false;

if (!isset($_SESSION["user_id"])) {
  require_once dirname(__DIR__) . '/views/401.php';
  return;
}

require_once dirname(__DIR__) . '/models/UserModel.php';

require_once dirname(__DIR__) . "/views/ProfileView.php";