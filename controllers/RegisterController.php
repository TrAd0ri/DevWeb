<?php

$isError = $_GET['error'] == 'true' ? true : false;

if (isset($_SESSION["user_id"])) {
  header("Location: ./");
  return;
}

require_once dirname(__DIR__) . '/views/RegisterView.php';