<?php
require_once "./vendor/autoload.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createMutable(__DIR__);
$dotenv->load();

require_once  "./src/helpers/index.php";
require_once "./src/config/connection.php";
require_once "./src/config/amqp.php";
require_once "./src/worker/send.php";
require_once  "./src/controllers/index.php";
require_once "./src/middlewares/validToken.php";
require_once  "./src/routes/index.php";
