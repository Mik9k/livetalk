<?php

class User extends SessionController{
    public function __construct(){
        parent::__construct();
    }

    private $userParams = [
        'first-name',
        'last-name',
        'email',
        'username',
        'password',
        'phone'
    ];

    public function render(){

        $user = new UserModel();
        $user->get($_SESSION[constant('SESSION_NAME')], 'EMAIL');
        //$user = $user->encode();
        $this->view->render('user/edit-account', ['user' => $user]);
    }

    public function users(){
        $user = new UserModel();
        $owner = new UserModel();

        $owner->get($_SESSION[constant('SESSION_NAME')], 'EMAIL');
        $users = $user->getAll();
        // var_dump($users[0]->getName());

        $this->view->render('user/users', ['users' => $users, 'owner' => $owner->serialize()]);

    }

    public function editAccount(){
        if($this->existsPOST(['first-name', 'last-name', 'nickname', 'email', 'pwd', 'phone'])){
            //NAME VALIDATION
            $this->isLetter($this->getPOST('first-name'));
            $this->isLetter($this->getPOST('last-name'));
            $this->isPhone($this->getPOST('phone'));

            //USER NAME VALIDATION
            if( $this->getPOST('nickname') == '' ){
                echo 'El nombre de usuario no puede estar vacio';
            }

            
            //IF IS ALL VALID THEN INSTANCE A USER MODEL AND UPDATE
            $user = new UserModel();
            $user->get($this->getPOST('email'), 'EMAIL');
            $user->setName($this->getPOST('first-name'));
            $user->setLastname($this->getPOST('last-name'));
            $user->setNickname($this->getPOST('nickname'));
            $user->setPhone($this->getPOST('phone'));

            //CAHNGE PASSWORD
            if( $this->getPOST('pwd') != '' ){
                //IS PASSWORD VALID DOESNT WORK, HOT FIX LATER
                $user->setPassword($this->getPOST('pwd'));
                $user->encryptPWD();
                // echo '<h1 class="text-light">'.$this->getPOST('pwd').'</h1>';

            }

            //IMAGE HANDLING
            $hImg = new Image();
            $imgBin = $hImg->handler('user-thumb');

            //SET NEW USER AVATAR
            if($imgBin != false){
                $user->setAvatar($imgBin);
            }

            //UDPATE
            $user->update();

            //RESPOND WITH AN SERIALIZED USER ISNTANCE
           $this->render();
        }

    }

    public function delete(){
        $user = new UserModel();
        $user->remove();

        $this->close_session();

        $this->view->render('login/signup', []);
    }

    public function remove($email){
        $user = new UserModel();
        $user->remove($email[0]);
        $this->redirect('user/users', []);
    }

    public function signeditor($email){
        $user = new UserModel();
        $user->signEditor($email[0]);
        $this->redirect('user/users', []);
    }

    public function isLetter($word){
        if(preg_match(constant('LETTERSREGEX') ,$word) == 0){
            echo 'Los nombres o apellidos solo pueden contener letras';
            //echo http_response_code(constant('BAD_REQUEST'));
            exit();
        }

        return true;
    }

    //VALIDATE EDIT INFORMATION
    //MAKE AN STORED PROCEDURE

    //ADD A LIST OF THEW OWN NEWS
}

?>