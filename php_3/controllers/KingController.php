<?php
//require_once "TwigBaseController.php"; 

class KingController extends TwigBaseController {
    public $title = "Король Стейтен-Айленда"; 
    public $template = "__object.twig"; 
    
    public function getContext() : array
    {
       
        $context = parent::getContext(); 
        $context['page'] = "king";
        $context['title'] = $this->title; 
        return $context;
    }
    
}