<?php
require_once "../controllers/StudentController.php";

class StudentImageController extends StudentController {
    public $template = "base_image.twig";
      
    public function getContext(): array
    {
        $context = parent::getContext(); 
        $context['image'] = "/images/student.jpg";
        $context['type'] = "image";
        return $context;
    }
}