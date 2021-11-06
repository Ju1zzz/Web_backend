<?php
require_once "BaseFilmTwigController.php";

class ObjectController extends BaseFilmTwigController {
    public $template = "__object.twig"; // указываем шаблон

    public function getContext(): array
    {
        $context = parent::getContext();
        
        
     /*   $query = $this->pdo->prepare("SELECT description, title, id FROM objects WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();
        $data = $query->fetch();
        $context['description'] = $data['description'];
        $context['id'] = $data['id'];
        $context['title'] = $data['title'];*/

            $query = $this->pdo->prepare("SELECT image, info, description, title, id FROM objects WHERE id= :my_id");
            $query->bindValue("my_id", $this->params['id']);
            $query->execute();
            $data = $query->fetch();
            $context['id'] = $data['id'];
            $context['title'] = $data['title'];

        if(isset($_GET['view'])=='image'){
           
            
            $context['image'] = $data['image'];
            $context['type'] = "image";

        }
        elseif(isset($_GET['view'])){
            
            
            $context['text'] = $data['info'];
            $context['type'] = "text";
    
        }
        else {
            
            $context['description'] = $data['description'];
            
        } 
        return $context;
    }
}