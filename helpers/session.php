<?php

class SessionController extends Controller{

    private $user;
    private $types;
    public $redirect;

    public function __construct(){
        parent::__construct();
        
        session_start();

        $this->init();
        
        return;
    }

    private function init(){
        //IF SESSION ALREADY EXISTS
        if(isset($_SESSION[constant('SESSION_NAME')])){

            //var_dump($_SESSION);

            //GET USER TYPE
            $type = $this->userType();

            //GET REQUESTED URI
            $url = $this->getRequestedURI();

            //LOAD USER PROFILES
            $profiles = $this->loadAccessProfiles();

            //VALIDATE ACCESS
            //$this->redirect = $this->auth( $url, $type, $profiles );
            $this->auth( $url, $type, $profiles );

            //print('session');

        }else{ //IF THE SESSION DOESNT EXISTS
            $profiles = $this->loadAccessProfiles();
            $type = 'USUARIO';
            $url = $this->getRequestedURI();
            $this->auth( $url, $type, $profiles );
        }

        return;
    }

    public function close_session(){
        if(isset($_SESSION[constant('SESSION_NAME')])){
            if(session_status() == PHP_SESSION_ACTIVE){
                session_destroy();
            }
        }
    }

    public function getUserSession(){
        if(isset($_SESSION[constant('SESSION_NAME')])){
            return $_SESSION[constant('SESSION_NAME')];
        }

        return null;
    }

    public function userType(){
        $this->user = new UserModel();
        $this->user->get($_SESSION[constant('SESSION_NAME')], 'EMAIL');
        return $this->user->getType();
    }

    public function session($userEmail){
        $_SESSION[constant('SESSION_NAME')] = $userEmail;
        $this->init();
        //var_dump($_SESSION);
    }

    public function loadAccessProfiles(){
        $profiles = file_get_contents("config/access.json");
        $profiles = json_decode($profiles, true);

        return $profiles;
    }

    private function getRequestedURI(){
        $url = $_SERVER['REQUEST_URI'];
        $url = trim($url, '/');
        $url = explode('/', $url);
        $url = preg_replace( "/\?.*/", "", $url[1]);

        return $url; 
    }

    private function auth($url ,$type, $profiles){
        if( in_array($url, $profiles[$type] ) ){
            //USER CAN STAY ON THE PAGE
            return;
        }else{
            //USER HAS NO ACCESS FOR THE REQUESTED PAGE AND THEN REDIRECT
            //TO HIS DEFAULT PAGE
            $default = $profiles['default-sites'][$type];
            header('location: /livetalkapp/'.$default);
        }
    }

}

?>