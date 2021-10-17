<?php
require_once "../controllers/GameController.php";

class GameImageController extends GameController {
    public $template = "base_image.twig";
      
    public function getContext(): array
    {
        $context = parent::getContext(); 
            $context['image'] = "/images/gra-v-kalmara.jpg";
        $context['type'] = "image";
        return $context;
    }
}