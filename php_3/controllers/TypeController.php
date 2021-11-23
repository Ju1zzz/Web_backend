<?php
require_once "BaseFilmTwigController.php";

class TypeController extends BaseFilmTwigController {
     public $template = "type.twig";// указываем шаблон

    public function getContext(): array{
        
        $context = parent::getContext();
        

        $query = $this->pdo->query("SELECT  * FROM types ORDER BY 1");
        $types = $query->fetchAll();
        $context['types'] = $types;
            
        return $context;
    }
}