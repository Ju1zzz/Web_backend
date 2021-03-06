<?php
require_once "BaseFilmTwigController.php";

class FilmObjectCreateController extends BaseFilmTwigController {
    public $template = "film_object_create.twig";
    
    public function post(array $context) {
        
        $title = $_POST['title'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $info = $_POST['info'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $name =  $_FILES['image']['name'];
        $video = $_POST['video'];
        
        move_uploaded_file($tmp_name, "../public/media/$name");
        $image_url = "/media/$name";

        $sql = <<<EOL
INSERT INTO objects(title, description, type, info, image, video)
VALUES(:title, :description, :type, :info, :image_url, :video)
EOL;

        // подготавливаем запрос к БД
        $query = $this->pdo->prepare($sql);
        // привязываем параметры
        $query->bindValue("title", $title);
        $query->bindValue("description", $description);
        $query->bindValue("type", $type);
        $query->bindValue("info", $info);
        $query->bindValue("image_url", $image_url);
        $query->bindValue("video", $video);
       
        
        $query->execute();
        
        $context['id'] = $this->pdo->lastInsertId(); 
        $context['message'] = 'Вы успешно создали объект';
        
        $this->get($context);
    }
}
