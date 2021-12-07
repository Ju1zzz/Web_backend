<?php
class LogInController extends TwigBaseController{
    public $template="logIn.twig";


    public function post(array $context){
        $user = isset($POST['user']) ? $POST['user'] : '';
        $password = isset($POST['password']) ? $POST['password'] : '';
        $_SESSION["is_logged"]=False;
        $sql = <<<EOL
        SELECT * FROM users WHERE username = :username AND password = :password
        EOL;

        $query = $controller->pdo->prepare($sql);
        $query->bindValue("username", $user);
        $query->bindValue("password", $password);
        $query->execute();

        $data = $query->fetch();
        
        if ($data) {
            $_SESSION["is_logged"]=True;
        }
    }
}