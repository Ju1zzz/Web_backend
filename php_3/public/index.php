<?php

require_once "../vendor/autoload.php";
require_once "../framework/autoload.php";
//require_once "../middlewares/LoginRequiredModdleware.php";
require_once "../controllers/MainController.php";
require_once "../controllers/ObjectController.php";
require_once "../controllers/SearchController.php";
require_once "../controllers/FilmObjectCreateController.php";
require_once "../controllers/TypeObjectCreateController.php";
require_once "../controllers/TypeController.php";
require_once "../controllers/FilmObjectDeleteController.php";
require_once "../controllers/FilmObjectUpdateController.php";
require_once "../framework/BaseRestController.php";

require_once "../controllers/Controller404.php";


$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader, [
    "debug" => true 
]);

$twig->addExtension(new \Twig\Extension\DebugExtension());

$pdo = new PDO("mysql:host=localhost;dbname=to_watch;charset=utf8", "root", "");

$router = new Router($twig, $pdo);
$router->add("/", MainController::class);
$router->add("/object/(?P<id>\d+)", ObjectController::class);
$router->add("/search", SearchController::class);
$router->add("/add", FilmObjectCreateController::class);
    //  ->middleware(new LoginRequiredModdleware());
$router->add("/add_type", TypeObjectCreateController::class);
      // ->middleware(new LoginRequiredModdleware());
$router->add("/types", TypeController::class);
$router->add("/object/(?P<id>\d+)/delete", FilmObjectDeleteController::class);
      // ->middleware(new LoginRequiredModdleware());
$router->add("/object/(?P<id>\d+)/edit", FilmObjectUpdateController::class);
     //  ->middleware(new LoginRequiredModdleware());
$router->add("/api/objects", BaseRestController::class);
$router->add("/api/objects/(?P<id>\d+)", BaseRestController::class);
$router->get_or_default(Controller404::class);