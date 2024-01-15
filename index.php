<?php

use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

$uri = rtrim(dirname($_SERVER["SCRIPT_NAME"]), '/');
$uri = '/' . trim(str_replace($uri, '', $_SERVER['REQUEST_URI']), '/');
$uri = urldecode($uri);
$uri = strtok($uri, '?');

session_start();

switch ($uri) {
  case '/':
    require_once __DIR__ . '/controllers/HomeController.php';
    break;
  case '/library':
    require_once __DIR__ . '/controllers/LibraryController.php';
    break;
  case '/game':
    require_once __DIR__ . '/controllers/GameController.php';
    break;
  case '/login':
    require_once __DIR__ . '/controllers/LoginController.php';
    break;
  case '/register':
    require_once __DIR__ . '/controllers/RegisterController.php';
    break;
    case '/profile':
      require_once __DIR__ . '/controllers/ProfileController.php';
      break;
  default:
    header('HTTP/1.0 404 Not Found');
    require_once __DIR__ . '/views/404.php';
    break;
}