<?php

require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];

$title = "";
$template = "";

$context = []; 

if ($url == "/") {
    $title = "Главная";
    $template = "main.twig";
    
} elseif (preg_match("#/king#", $url)) {
    $title = "Король Стейтен-Айленда";
    $template = "__oblect.twig";
    

    if (preg_match("#/king/image#", $url)) {
    $template = "base_image.twig";
    $context['image'] = "/images/king.jpg";
    $context['type'] = "image";

    } elseif(preg_match("#/king/info#", $url)) {
        $template = "base_info.twig";
        $context['text'] = file_get_contents("C:\WEB-backend\php_3\views\king-about.php");
        $context['type'] = "text";
    }  
} elseif (preg_match("#/student#", $url)) {
    $title = "Ученик чудовища";
    $template = "__oblect.twig";
    

    if (preg_match("#/student/image#", $url)) {
    $template = "base_image.twig";
    $context['image'] = "/images/student.jpg";
    $context['type'] = "image";

    } elseif(preg_match("#/student/info#", $url)) {
        $template = "base_info.twig";
        $context['text'] = file_get_contents("C:\WEB-backend\php_3\views\student-about.php");
        $context['type'] = "text";
    }  
} elseif (preg_match("#/game#", $url)) {
    $title = "Игра в кальмара";
    $template = "__oblect.twig";
    

    if (preg_match("#/game/image#", $url)) {
    $template = "base_image.twig";
    $context['image'] = "/images/gra-v-kalmara.jpg";
    $context['type'] = "image";

    } elseif(preg_match("#/game/info#", $url)) {
        $template = "base_info.twig";
        $context['text'] = file_get_contents("C:\WEB-backend\php_3\views\game-about.php");
        $context['type'] = "text";
    }  
} 


$context['title'] = $title;

echo $twig->render($template, $context);
?>