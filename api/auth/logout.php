<?php

require_once dirname(__DIR__) . "/loadEnv.php";
require_once dirname(__DIR__, 2) . "/models/UserModel.php";

session_start();
session_destroy();
header("Location: ./../../login");
exit();