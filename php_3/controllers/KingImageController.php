<?php
require_once "../controllers/KingController.php";

class KingImageController extends KingController {
    public $template = "base_image.twig";
      
    public function getContext(): array
    {
        $context = parent::getContext(); 
            $context['image'] = "/images/king.jpg";
        $context['text'] = file_get_contents("C:/WEB-backend/php_3/views/king-about.php");
        $context['type'] = "image";
        return $context;
    }
}