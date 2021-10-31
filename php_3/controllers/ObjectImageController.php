<?php

class ObjectImageController extends TwigBaseController {
    public $template = "base_image.twig";
      
    public function getContext(): array
    {
        $context = parent::getContext(); 

        $query = $this->pdo->prepare("SELECT image, id FROM objects WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();
        $data = $query->fetch();
        
        $context['image'] = $data['image'];
        $context['type'] = "image";
        return $context;
    }
}