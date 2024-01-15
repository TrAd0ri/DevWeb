<?php

require_once dirname(__DIR__) . "/loadEnv.php";
require_once dirname(__DIR__, 2) . "/models/UserModel.php";

$_SESSION["user_id"] = null;
$_SESSION["user_name"] = null;
$_SESSION["user_surname"] = null;
$_SESSION["user_email"] = null;

session_destroy();


header("Location: ./../../login");
exit();