<?php

class ObjectController extends TwigBaseController {
    public $template = "__object.twig"; // указываем шаблон

    public function getContext(): array
    {
        $context = parent::getContext();
        
       /* echo "<pre>";
        print_r($this->params);
        echo "</pre>";*/
        
        $query = $this->pdo->prepare("SELECT description, id FROM objects WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();
        $data = $query->fetch();
        
        $context['description'] = $data['description'];
        $context['id'] = $data['id'];
        return $context;
    }
}