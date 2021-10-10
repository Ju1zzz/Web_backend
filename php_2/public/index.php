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
} elseif (preg_match("#/mermaid#", $url)) {
    $title = "Русалка";
    $template = "__object.twig";
    $context['image'] = "/images/mermaid.jpg"; 

} elseif (preg_match("#/uranus#", $url)) {
    $title = "Уран";
    $template = "__object.twig";
    $context['image'] = "/images/uranus.png"; 

}

$context['title'] = $title;

echo $twig->render($template, $context);
?>