<?php

class View{
    public function __construct(){

    }

    private $data;

    public function render($view, $data = []){
        $this->data = $data;
        require 'views/'.$view.'.php';
    }
}

?>
