<?php

use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

$uri = rtrim(dirname($_SERVER["SCRIPT_NAME"]), '/');
$uri = '/' . trim(str_replace($uri, '', $_SERVER['REQUEST_URI']), '/');
$uri = urldecode($uri);

switch ($uri) {
  case '/':
    require_once __DIR__ . '/controllers/HomeController.php';
    break;
  case '/login':
    require_once __DIR__ . '/controllers/LoginController.php';
    break;
  default:
    header('HTTP/1.0 404 Not Found');
    require_once __DIR__ . '/views/404.php';
    break;
}