<?php

class BaseFilmTwigController extends TwigBaseController {
    public function getContext(): array 
    {
        $context = parent::getContext();

        $query = $this->pdo->query("SELECT  * FROM types ORDER BY 1");
        $types = $query->fetchAll();
        $context['types'] = $types;
        // $context['id_t'] = $data['id'];
        // $context['name'] = $data['name'];
        // $context['pic'] = $data['pic'];
        

        return $context;
    }
}