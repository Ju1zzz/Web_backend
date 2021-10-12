<?php

require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];

$title = "";
$template = "";

$context = []; 
$objects = [ 
    [
        "title" => "Главная",
        "url" => "/"
    ],
    [
        "title" => "Король Стейтен-Айленда",
        "url-main" => "/king",
        "url-image" => "",
        "url-about" => ""
    ],
    [
        "title" => "Ученик чудовища",
        "url-main" => "/student",
    ],
    [
        "title" => "Игра в кальмара",
        "url-main" => "/game",
    ]
];
//$context['title'] = $title;
$context['objects'] = $objects;

//echo $twig->render($template, $context);

if ($url == "/") {
    $title = "Главная";
    $template = "main.twig";
    
} elseif (preg_match("#/king/image#", $url)) {
    $title = "Король Стейтен-Айленда";
    $template = "base_image.twig";
    $context['image'] = "/images/king.jpg";
    
} elseif (preg_match("#/king/info#", $url)) {
    $title = "Король Стейтен-Айленда";
    $template = "base_info.twig";
    $context['text'] = "hgvhjhhgjhhhhhhhhhhhhhhhhhhhhhhhhhhh";
    
} 
elseif (preg_match("#/student#", $url)) {
    $title = "Ученик чудовища";
    $template = "base_image.twig";
    $context['image'] = "/images/student.jpg"; 
    
}elseif (preg_match("#/game#", $url)) {
    $title = "Игра в кальмара";
    $template = "base_image.twig";
    $context['image'] = "/images/gra-v-kalmara.jpg"; 
}

$context['title'] = $title;

echo $twig->render($template, $context);
?>