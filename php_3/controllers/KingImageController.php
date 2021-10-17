<?php
require_once "../controllers/KingController.php";

class KingImageController extends KingController {
    public $template = "base_image.twig";
      
    public function getContext(): array
    {
        $context = parent::getContext(); 
            $context['image'] = "/images/king.jpg";
        $context['type'] = "image";
        return $context;
    }
}