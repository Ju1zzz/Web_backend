<?php
require_once "TwigBaseController.php"; 

class MainController extends TwigBaseController {
    public $template = "main.twig";
    public $title = "Главная";

    public function getContext() : array
    {
       
        $context = parent::getContext(); 
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
        $context['menu'] = $menu;
        return $context;
    }
    
}