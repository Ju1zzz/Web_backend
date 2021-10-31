<?php
require_once "BaseController.php"; 

class TwigBaseController extends BaseController {
    public $title = ""; 
    public $template = ""; 
    protected \Twig\Environment $twig; 
    
    public function setTwig($twig) {
        $this->twig = $twig;
    }
    
    // переопределяем функцию контекста
    public function getContext() : array
    {
        $context = parent::getContext(); // вызываем родительский метод
        $query = $this->pdo->prepare("SELECT title, id FROM objects WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();
        $data = $query->fetch();
        if ($data){
        $context['title'] = $data['title'];
        $context['id'] = $data['id'];
        }
        
        return $context;
    }
    

    public function get() {
        echo $this->twig->render($this->template, $this->getContext());
    }
}


