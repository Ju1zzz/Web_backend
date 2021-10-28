<?php
require_once "BaseController.php"; 

class TwigBaseController extends BaseController {
    public $title = ""; 
    public $template = ""; 
    protected \Twig\Environment $twig; 
    
    
    /*public function __construct($twig)
    {
        $this->twig = $twig; // пробрасываем его внутрь
    }*/
    
    public function setTwig($twig) {
        $this->twig = $twig;
    }
    
    // переопределяем функцию контекста
    public function getContext() : array
    {
        $context = parent::getContext(); // вызываем родительский метод
        //$context['title'] = $this->title; // добавляем title в контекст
        $query = $this->pdo->prepare("SELECT title FROM objects WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();
        $data = $query->fetch();
        
        $context['title'] = $data['title'];
       /* $menu = [ 
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
        $context['menu'] = $menu;*/
        return $context;
    }
    

    public function get() {
        echo $this->twig->render($this->template, $this->getContext());
    }
}