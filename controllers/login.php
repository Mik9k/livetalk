<?php


class Login extends SessionController{
    public function __construct(){
        parent::__construct();

    }

    private $imageHandler;

    private $signupParams = [
        'first-name',
        'last-name',
        'email',
        'username',
        'password',
        'phone'
    ];

    public function render(){
        $this->view->render('login/signup');
    }

    public function signup(){


        if( $this->existsPOST($this->signupParams)){

            $user = new UserModel();
            $hImg = new Image();
            $user->setFrom($_POST);

            $imgbin = $hImg->handler('user-thumb');//$this->imageHander('user-thumb');

            $this->isLetter($user->getName());
            $this->isLetter($user->getLastname());
            $this->isPhone($user->getPhone());
            $this->isEmail($user->getEmail());
            
            if($imgbin != false){
                $user->setAvatar($imgbin);
                $user->encryptPWD();
                $user->save();
                http_response_code(constant('CREATED'));
                //REDIRECT TO DASHBOARD PAGE FOR AN USER TYPE
                //OPEN SESSION
                $this->session($user->getEmail());
                echo $user->encode();
                
            }else{
                http_response_code(constant('BAD_REQUEST'));
                echo 'Must have an image';
            }            
        }

        
        //serialize the objct and send it like json for get user data
    }

    public function users(){
        $users = new UserModel();
        var_dump($users->getAll());
    }

    public function login(){
        if($this->existsPOST(['email', 'pwd'])){

            $user = new UserModel();
            if($user->comparePwd($this->getPOST('email'), $this->getPOST('pwd'))){
                //START SESSION
                $this->session($this->getPOST('email'));



                //GET USER DATA
                $user->get($this->getPOST('email'));
                //REDIRECT TO USER DAHSBOARD
                echo $user->encode();
            }else{
                $this->redirect('login');
            }
        }

    }

    /* private function isEmail($email){
        if(preg_match(constant('EMAILREGEX'), $email) == 0){
            echo 'Email is not valid';
            echo http_response_code(constant('BAD_REQUEST'));
            exit();
        }

        return true;

    }

    private function isPhone($phone){
        if(preg_match(constant('PHONEREGEX'), $phone) == 0){
            echo 'Phone is not valid';
            echo http_response_code(constant('BAD_REQUEST'));
            exit();
        }

        return true;

    }

    private function isLetter($word){
        if(preg_match(constant('LETTERSREGEX') ,$word) == 0){
            echo 'I can be just numbers';
            echo http_response_code(constant('BAD_REQUEST'));
            exit();
        }

        return true;

    }

    private function isPassword($password){
        if(preg_match(constant('PASSWORDREGEX'), $password) == 0){
            echo 'Password not valid';
            echo http_response_code(constant('BAD_REQUEST'));
            exit();
        }

        return true;

    } */
}


?>