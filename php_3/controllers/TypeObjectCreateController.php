<?php
require_once "BaseFilmTwigController.php";

class TypeObjectCreateController extends BaseFilmTwigController {
    public $template = "type_object_create.twig";
    
    public function post(array $context) {
        
        $nam = $_POST['nam'];
        $tmp_name = $_FILES['pic']['tmp_name'];
        $name =  $_FILES['pic']['name'];
        //print_r($_FILES);
        move_uploaded_file($tmp_name, "../public/media_type/$name");
        $image_url = "/media_type/$name";

        $sql = <<<EOL
INSERT INTO types(name, pic)
VALUES(:nam, :image_url)
EOL;

        // подготавливаем запрос к БД
        $query = $this->pdo->prepare($sql);
        // привязываем параметры
        $query->bindValue("nam", $nam);
        $query->bindValue("image_url", $image_url);
       
        
        $query->execute();
        
        $context['message'] = 'Вы успешно создали тип';
        $context['id'] = $this->pdo->lastInsertId(); 

        $this->get($context);
    }
}
