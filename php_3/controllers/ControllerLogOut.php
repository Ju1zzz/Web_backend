
<?php
require_once "BaseFilmTwigController.php";

class ControllerLogOut extends BaseFilmTwigController {

    public function get(array $context){
        $_SESSION["is_logged"] = false;
        header('Location: /login');
        exit; 
    }
}