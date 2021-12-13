<?php
require_once "BaseFilmTwigController.php"; 

class MainController extends BaseFilmTwigController {
    public $template = "main.twig";
    public $title = "Главная";

    public function getContext() : array
    {
       
        $context = parent::getContext(); 
    
       if (isset($_GET['type'])) {
       $query = $this->pdo->prepare("SELECT * FROM objects WHERE type = :type");
       $query->bindValue("type", $_GET['type']);
       $query->execute();
      
    }
    else {
       $query = $this->pdo->query("SELECT * FROM objects");
    }

    $context['objects'] = $query->fetchAll();
    $context["messages"] = isset($_SESSION['messages']) ? $_SESSION['messages'] : "";
    return $context;
    }
    
}
