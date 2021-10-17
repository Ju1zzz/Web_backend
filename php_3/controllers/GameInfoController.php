<?php
require_once "GameController.php";

class GameInfoController extends GameController {
    public $template = "base_info.twig";
    
    public function getContext(): array
    {
        $context = parent::getContext(); 

        $template = "base_info.twig";
        $context['text'] = file_get_contents("C:/WEB-backend/php_3/views/game-about.php");
        $context['type'] = "text";

        return $context;
    }
}