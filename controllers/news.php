<?php

class News extends SessionController{
    public function __construct(){
        parent::__construct();
    }

    public function render(){
        $type = $this->userType();
        if($type == NULL){

            $type = 'USUARIO';
        }
        $this->view->render('news/index', ['type' => $type]);
    }
    
    public function post(){
        $this->view->render('news/post');
    }/* 

    private function userTabs(){
        $options = [];

        if(isset($_SESSION[constant('SESSION_NAME')])){
            $type = $this->userType();
            $access = $this->loadAccessProfiles();
            $options = $access[$type];
            return $options;
        }else{
            return array('Registrarse', 'Iniciar sesion');
        }
    } */
}

?>