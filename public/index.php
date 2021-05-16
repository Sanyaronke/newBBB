<?php

use App\Core\Main;

define("URL", str_replace("public/index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require "../vendor/autoload.php";

$app = new Main();
$app->start();