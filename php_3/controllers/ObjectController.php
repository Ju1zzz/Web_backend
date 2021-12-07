<?php
require_once "BaseFilmTwigController.php";

class ObjectController extends BaseFilmTwigController {
     public $template = "__object.twig";// указываем шаблон

     public function getTemplate(){
        if(isset($_GET['view'])){
           
            if($_GET['view']=='image'){
           return "base_image.twig";
            
            }
            elseif ($_GET['view']=='info') {
           return "base_info.twig";

            }
        }
        return parent::getTemplate();
    }

    public function getContext(): array{
        
        $context = parent::getContext();
        

            $query = $this->pdo->prepare("SELECT image, info, description, title, id FROM objects WHERE id= :my_id");
            $query->bindValue("my_id", $this->params['id']); 
            $query->execute();
            $data = $query->fetch();
            $context['id'] = $data['id'];
            $context['title'] = $data['title'];
            

        if(isset($_GET['view'])){
           
            if($_GET['view']=='image'){

            $context['type'] = "image";
            $context['image'] = $data['image'];
            }
            elseif ($_GET['view']=='info') {
            $context['type'] = "text";
            $context['text'] = $data['info'];
            }
        }
        else {
           
            $context['description'] = $data['description'];    
        } 
        $context["messages"] = isset($_SESSION['messages']) ? $_SESSION['messages'] : "";
        return $context;
    }
}