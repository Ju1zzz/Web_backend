<?php
require_once "TwigBaseController.php"; 

class StudentController extends TwigBaseController {
    public $title = "Ученик чудовища"; 
    public $template = "__object.twig"; 
    
    public function getContext() : array
    {
       
        $context = parent::getContext(); 
        $context['page'] = "student";
        $context['title'] = $this->title; 
        return $context;
    }
    
}