<?php

class HistoryMiddleware extends BaseMiddleware{
    public function apply(BaseController $controller, array $context){
        if(!isset($_SESSION['messages'])){
            $_SESSION['messages'] = [];
            }
            $url = $_SERVER['HTTP_REFERER'];
            if (count($_SESSION['messages']) > 5 ) {
            array_shift($_SESSION['messages']);
            }
            array_push($_SESSION['messages'], parse_url($url, PHP_URL_PATH));       
    }
}