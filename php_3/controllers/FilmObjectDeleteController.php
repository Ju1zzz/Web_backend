<?php

class FilmObjectDeleteController extends BaseController {
    public function post(array $context)
    {
        $id = $this->params['id']; // взяли id

        $sql =<<<EOL
DELETE FROM objects WHERE id = :id
EOL; 
        // выполнили
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":id", $id);
        $query->execute();
        header("Location: /");
        exit;
    }
}