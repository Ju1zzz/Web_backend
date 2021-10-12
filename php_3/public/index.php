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
        "url-main" => "/"
    ],
    [
        "title" => "Король Стейтен-Айленда",
        "url-main" => "/king",
        "url-image" => "/king/image",
        "url-about" => "/king/info"
    ],
    [
        "title" => "Ученик чудовища",
        "url-main" => "/student",
        "url-image" => "/student/image",
        "url-about" => "/student/info"
    ],
    [
        "title" => "Игра в кальмара",
        "url-main" => "/game",
        "url-image" => "/game/image",
        "url-about" => "/game/info"
    ]
];
$context['objects'] = $objects;

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
elseif (preg_match("#/student/image#", $url)) {
    $title = "Ученик чудовища";
    $template = "base_image.twig";
    $context['image'] = "/images/student.jpg"; 
    
}elseif (preg_match("#/student/info#", $url)) {
    $title = "Ученик чудовища";
    $template = "base_info.twig";
    $context['text'] = "stuuuuuuuuuuuuuuuuudent"; 
    
}elseif (preg_match("#/game/image#", $url)) {
    $title = "Игра в кальмара";
    $template = "base_image.twig";
    $context['image'] = "/images/gra-v-kalmara.jpg"; 

}elseif (preg_match("#/game/info#", $url)) {
    $title = "Игра в кальмара";
    $template = "base_info.twig";
    $context['text'] = "gaaaaaaaaaaaaaaaaaaaaaameee"; 
}

$context['title'] = $title;

echo $twig->render($template, $context);
?>