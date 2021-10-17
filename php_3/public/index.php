<?php

require_once "../vendor/autoload.php";
require_once "../controllers/MainController.php";
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

$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];

$title = "";
$template = "";
$menu = [ 
    [
        "title" => "Ученик чудовища",
        "url-main" => "/student",
        "url-image" => "/student/image",
        "url-info" => "/student/info"
    ],
    [
        "title" => "Король Стейтен-Айленда",
        "url-main" => "/king",
        "url-image" => "/king/image",
        "url-info" => "/king/info"
    ],
    [
        "title" => "Игра в кальмара",
        "url-main" => "/game",
        "url-image" => "/game/image",
        "url-info" => "/game/info"
    ]
];

$context = []; 
$controller = new Controller404($twig);

/*if ($url == "/") {
    //$title = "Главная";
   // $template = "main.twig";
    $controller = new MainController($twig);
    
} elseif (preg_match("#/king#", $url)) {
    //$title = "Король Стейтен-Айленда";
    //$template = "__object.twig";
    //$context['page'] = "/king";
    $controller = new KingController($twig);

    if (preg_match("#/king/image#", $url)) {
    //$template = "base_image.twig";
    //$context['image'] = "/images/king.jpg";
    //$context['type'] = "image";
    $controller = new KingImageController($twig);
    
    } elseif(preg_match("#/king/info#", $url)) {

       // $template = "base_info.twig";
       // $context['text'] = file_get_contents("C:/WEB-backend/php_3/views/king-about.php");
       // $context['type'] = "text";
       $controller = new KingInfoController($twig);
    }  

} elseif (preg_match("#/student#", $url)) {
    //$title = "Ученик чудовища";
    //$template = "__object.twig";
    //$context['page'] = "/student";
    $controller = new StudentController($twig);

    if (preg_match("#/student/image#", $url)) {
    //$template = "base_image.twig";
   // $context['image'] = "/images/student.jpg";
   // $context['type'] = "image";
   $controller = new StudentImageController($twig);

    } elseif(preg_match("#/student/info#", $url)) {
        //$template = "base_info.twig";
       // $context['text'] = file_get_contents("C:/WEB-backend/php_3/views/student-about.php");
        //$context['type'] = "text";
        $controller = new StudentInfoController($twig);
    }  

} elseif (preg_match("#/game#", $url)) {
    //$title = "Игра в кальмара";
   // $template = "__object.twig";
    //$context['page'] = "/game";
    $controller = new GameController($twig);

    if (preg_match("#/game/image#", $url)) {
   // $template = "base_image.twig";
   // $context['image'] = "/images/gra-v-kalmara.jpg";
   // $context['type'] = "image";
    $controller = new GameImageController($twig);

    } elseif(preg_match("#/game/info#", $url)) {
       // $template = "base_info.twig";
        //$context['text'] = file_get_contents("C:/WEB-backend/php_3/views/game-about.php");
        //$context['type'] = "text";
        $controller = new GameInfoController($twig);
    }  
} */
if ($url == "/") {
    $controller = new MainController($twig);
    
}elseif (preg_match("#/king/image#", $url)) {
    $controller = new KingImageController($twig);
    
} elseif(preg_match("#/king/info#", $url)) {
       $controller = new KingInfoController($twig);

} elseif (preg_match("#/king#", $url)) {
    $controller = new KingController($twig);

} 
elseif (preg_match("#/student/image#", $url)) {
    $controller = new StudentImageController($twig);
    
} elseif(preg_match("#/student/info#", $url)) {
       $controller = new StudentInfoController($twig);

} elseif (preg_match("#/student#", $url)) {
    $controller = new StudentController($twig);

} elseif (preg_match("#/game/image#", $url)) {
    $controller = new GameImageController($twig);
    
} elseif(preg_match("#/game/info#", $url)) {
       $controller = new GameInfoController($twig);

} elseif (preg_match("#/game#", $url)) {
    $controller = new GameController($twig);

} 

//$context['title'] = $title;
//$context['menu'] = $menu;

//echo $twig->render($template, $context);
if ($controller) {
    $controller->get();
}
