<?php

require_once "../vendor/autoload.php";
require_once "../framework/autoload.php";
require_once "../controllers/MainController.php";
require_once "../controllers/ObjectController.php";
require_once "../controllers/KingController.php";
require_once "../controllers/StudentController.php";
require_once "../controllers/GameController.php";
require_once "../controllers/KingImageController.php";
require_once "../controllers/StudentImageController.php";
require_once "../controllers/GameImageController.php";
require_once "../controllers/KingInfoController.php";
require_once "../controllers/StudentInfoController.php";
require_once "../controllers/GameInfoController.php";
require_once "../controllers/Controller404.php";


$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader, [
    "debug" => true 
]);

$twig->addExtension(new \Twig\Extension\DebugExtension());

//$url = $_SERVER["REQUEST_URI"];

//$controller = new Controller404($twig);

$pdo = new PDO("mysql:host=localhost;dbname=to_watch;charset=utf8", "root", "");

$router = new Router($twig, $pdo);
$router->add("/", MainController::class);
$router->add("/king", KingController::class);
$router->add("/object/(\d+)", ObjectController::class);

$router->get_or_default(Controller404::class);