<?php

$isError = $_GET['error'] == 'true' ? true : false;

if (session_status() == PHP_SESSION_NONE) {
  header("Location: ./");
  return;
}

require_once dirname(__DIR__) . '/views/LoginView.php';
