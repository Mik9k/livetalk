<?php

class Controller{

    protected $view;
    private $model;

    public function __construct(){
        $this->view = new View();
    }

    public function loadModel($model){
        $modelFile = 'models/'.$model.'model.php';
        if(file_exists($modelFile)){
            require_once $modelFile;
            $modelName = $model.'Model';
            $this->model = new $modelName;
            return;
        }
    }

    public function existsPOST($params){
        foreach($params as $param){
            if(!isset($_POST[$param])){
                echo 'post param doesnt exists '.$param;
                return false;
            }
        }

        return true;
    }

    public function getPOST($param){
        return $_POST[$param];
    }

    public function redirect($root, $args = []){
        $data = [];
        $params = '';

        //GET ALL ARGS INTO ARRAY AND FORMATING LIKE KEY=VALUE
        foreach($args as $key => $value){
            array_push($data, $key.'='.$value);
        }

        //JOIN ALL ARGS INTO ARRAY BIND BY '&' LIKE KEY1=VALUE1&KEY2=VALUE2
        $params = implode('&', $data);

        //IF GET ARGS AFTER ROOT ADD '?' LIKE ?KEY=VALUE
        if($aprams != ''){
            $params = '?'.$params;
        }

        //BIND ARGS INTO ROOT LIKE HTTP://LOCALHOST/ROOT?KEY=1&VALUE1
        header('location: '.constant('URL').$root.$params);
    }

    public function isEmail($email){
        if(preg_match(constant('EMAILREGEX'), $email) == 0){
            echo 'Email is not valid';
            echo http_response_code(constant('BAD_REQUEST'));
            exit();
        }

        return true;

    }

    public function isPhone($phone){
        if(preg_match(constant('PHONEREGEX'), $phone) == 0){
            echo 'Phone is not valid';
            echo http_response_code(constant('BAD_REQUEST'));
            exit();
        }

        return true;

    }

    public function isLetter($word){
        if(preg_match(constant('LETTERSREGEX') ,$word) == 0){
            echo 'I can be just numbers';
            echo http_response_code(constant('BAD_REQUEST'));
            exit();
        }

        return true;

    }

    public function isPassword($password){
        if(preg_match(constant('PASSWORDREGEX'), $password) == 0){
            echo 'Password not valid';
            echo http_response_code(constant('BAD_REQUEST'));
            exit();
        }

        return true;

    }
}

?>