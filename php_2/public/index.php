<?php

// подключаем пакеты которые установили через composer
require_once '../vendor/autoload.php';

// создаем загрузчик шаблонов, и указываем папку с шаблонами
// \Twig\Loader\FilesystemLoader -- это типа как в C# писать Twig.Loader.FilesystemLoader, 
// только слеш вместо точек
$loader = new \Twig\Loader\FilesystemLoader('../views');

// создаем собственно экземпляр Twig с помощью которого будет рендерить
$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];

$title = "";
$template = "";
$context = []; 

if ($url == "/") {
    $title = "Главная";
    $template = "main.twig";
} elseif (preg_match("#/mermaid#", $url)) {
    $title = "Русалка";
    $template = "base_image.twig";
    
    $context['image'] = "/images/mermaid.jpg"; 
} elseif (preg_match("#/uranus#", $url)) {
    $title = "Уран";
    $template = "base_image.twig";
    
    $context['image'] = "/images/uranus.png"; 
}


$context['title'] = $title;

echo $twig->render($template, $context);
