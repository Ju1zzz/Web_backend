<?php
//require_once "TwigBaseController.php"; 

class MainController extends TwigBaseController {
    public $template = "main.twig";
    public $title = "Главная";

    public function getContext() : array
    {
       
        $context = parent::getContext(); 
    

        /*$query = $this->pdo->prepare("SELECT * FROM objects");
        $query->execute();
        $data = $query->fetchAll();

        $context['objects'] = $data;*/

        return $context;
    }
    
}
