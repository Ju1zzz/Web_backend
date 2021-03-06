<?php
//error_reporting(0);
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
        $context = parent::get($context);  
    }
    public function post(array $context) {
       
        $id = $this->params['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $info = $_POST['info'];
        $video = $_POST['video'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $name =  $_FILES['image']['name'];
        
        

        if($_FILES['image']['name']==''){
         $sql = <<<EOL
        UPDATE `objects` SET `title`= :title, `description`= :description, `type`= :type, `info`= :info, `video`= :video WHERE `id`= :id
        EOL;
        $query = $this->pdo->prepare($sql);   
        } else{
            move_uploaded_file($tmp_name, "../public/media/$name");
            $image_url = "/media/$name";
            $sql = <<<EOL
        UPDATE `objects` SET `title`= :title, `description`= :description, `type`= :type, `info`= :info,`image`= :image_url, `video`= :video  WHERE `id`= :id
        EOL; 
        $query = $this->pdo->prepare($sql);
        $query->bindValue("image_url", $image_url);
        }
                
        
        $query->bindValue(":id", $id);
        $query->bindValue(":title", $title);
        $query->bindValue(":description", $description);
        $query->bindValue(":type", $type);
        $query->bindValue(":info", $info);
        $query->bindValue(":video", $video);

        $query->execute();
        $context['message'] = 'Объект успешно обновлён';
        $this->get($context);
        
    }
}
