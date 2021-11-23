<?php
require_once "BaseFilmTwigController.php";

class FilmObjectUpdateController extends BaseFilmTwigController {
    public $template = "film_object_update.twig";
    
    public function get(array $context){
        $id = $this->params['id'];

        $sql = <<<EOL
        SELECT * FROM objects WHERE id = :id
        EOL;
        $query = $this->pdo->prepare($sql);
        $query->bindValue("id", $id);
        $query->execute();
        $data = $query->fetch();
        $context['object']=$data;
        $context['message'] = 'Объект успешно обновлён';
        $this->get($context);
    }
    public function post(array $context) {
        
    }
}
