<?php

require_once '../vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];

$title = "";
$template = "";

$context = [];
$menu = [ 
    [
        "title" => "Главная",
        "url" => "/",
    ],
    [
        "title" => "Русалка",
        "url" => "/mermaid",
    ],
    [
        "title" => "Уран",
        "url" => "/uranus",
    ]
];

$context['title'] = $title;
$context['menu'] = $menu; 

echo $twig->render($template, $context);