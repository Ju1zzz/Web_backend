<?php
require_once "BaseFilmTwigController.php";
 class SearchController extends BaseFilmTwigController{
     public $template = "search.twig";

     public function getContext(): array{
         $context = parent::getContext();

         $type = isset($_GET['type']) ? $_GET['type'] : '';
         $title = isset($_GET['title']) ? $_GET['title'] : '';
         $info = isset($_GET['info']) ? $_GET['info'] : '';

        if($type=="все"){
            $sql =<<<EOL
            SELECT * 
            from objects
            WHERE (:title=''OR title like CONCAT('%',:title,'%')) and (:info=''OR info like CONCAT('%',:info,'%'))
        EOL;
        }else{
            $sql =<<<EOL
            SELECT * 
            from objects
            WHERE (:title=''OR title like CONCAT('%',:title,'%')) and (type=:type) and (:info=''OR info like CONCAT('%',:info,'%'))
        EOL;
        }
        $query = $this->pdo->prepare($sql);

        $query->bindValue("title", $title);
        $query->bindValue("type", $type);
        $query->bindValue("info", $info);
        $query->execute();

        $context['objects'] = $query->fetchAll();
        return $context;
    }
 }
