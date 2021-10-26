<?php
//require_once "TwigBaseController.php"; 

class GameController extends TwigBaseController {
    public $title = "Игра в кальмара"; 
    public $template = "__object.twig"; 
    
    public function getContext() : array
    {
       
        $context = parent::getContext(); 
        $context['page'] = "game";
        $context['title'] = $this->title; 
        return $context;
    }
    
}