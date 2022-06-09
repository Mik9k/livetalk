<?php

require_once 'libs/iJsonSerialize.php';

class UserModel extends Model implements iJsonSerialize{

    public function __construct(){
        parent::__construct();
    }

    private $email = '';
    private $avatar = '';
    private $name = '';
    private $lastname = '';
    private $phone = '';
    private $nickname = '';
    private $type = '';
    private $pwd = '';

    public function save(){
        try{
            $query = $this->prepare('call sp_user(:email, :pwd, :name, :lastname, :nick, :avatar, :phone, :op)');
            $query->execute([
                'email' => $this->email,
                'pwd' => $this->pwd,
                'name' => $this->name,
                'lastname' => $this->lastname,
                'nick' => $this->nickname,
                'avatar' => $this->avatar,
                'phone' => $this->phone,
                'op' => 'INSERT'
            ]);

            return true;
        }catch(PDOException $e){
            print_r( 'Something went wrong '.$e->getMessage());
            return false;
        }
    }

    public function update(){
        try{
            $query = $this->prepare('call sp_user(:email, :pwd, :name, :lastname, :nick, :avatar, :phone, :op)');
            $query->execute([
                'email' => $this->email,
                'pwd' => $this->pwd,
                'name' => $this->name,
                'lastname' => $this->lastname,
                'nick' => $this->nickname,
                'avatar' => $this->avatar,
                'phone' => $this->phone,
                'op' => 'UPDATE'
            ]);

            return true;
        }catch ( PDOException $e ){
            print_r( 'Something went wrong '.$e->getMessage());
            return false;
        }
    }

    public function remove($email = ''){
        try{

            $email = $email == '' ? $_SESSION[constant('SESSION_NAME')] : $email;

            $query = $this->prepare("call sp_user(:email, '', '', '', '','', '', 'DELETE')");
            $query->execute([
                'email' => $email
            ]);

            return true;
        } catch (PDOException $e) {
            print_r( 'Something went wrong '.$e->getMessage());
            return false;
        }
    }

    public function signEditor($email){
        try{

            $query = $this->prepare("call sign_editor(:email)");
            $query->execute([
                'email' => $email
            ]);

            return true;
        } catch (PDOException $e) {
            print_r( 'Something went wrong '.$e->getMessage());
            return false;
        }
    }

    public function getAll(){
        $users = [];

        try {
            $query = $this->query("call sp_user('', '', '', '', '', '', '', 'SELECT')");            
            while($row = $query->fetch(PDO::FETCH_ASSOC)){

                $user = new UserModel();
                $user->setEmail($row['email']);
                $user->setAvatar($row['avatar']);
                $user->setName($row['name']);
                $user->setLastname($row['lastname']);
                $user->setPhone($row['phone']);
                $user->setNickname($row['nickname']);
                $user->setType($row['type']);

                array_push($users, $user);

            }

            return $users;

        } catch (PDOException $e) {
            print_r( 'Something went wrong '.$e->getMessage());
            return false;
        }
    }

    public function get($email, $op){
        try {
            $query = $this->prepare('call sp_get_user(:op, :email)');
            $query->execute(['op' => $op ,'email' => $email]);
            $user = $query->fetch(PDO::FETCH_ASSOC);

            $this->email = $user['email'];
            $this->avatar = $user['avatar'];
            $this->name = $user['name'];
            $this->lastname = $user['lastname'];
            $this->phone = $user['phone'];
            $this->nickname = $user['nickname'];
            $this->type = $user['type'];
            $this->phone = $user['phone'];

            return true;

        } catch (PDOException $e) {
            print_r( 'Something went wrong '.$e->getMessage());
            return false;
        }
    }

    public function setFrom($data = []){

        $this->email = $data['email'];
        $this->avatar = $data['user-thumb'];
        $this->name = $data['first-name'];
        $this->lastname = $data['last-name'];
        $this->phone = $data['phone'];
        $this->nickname = $data['username'];
        $this->phone = $data['phone'];
        $this->pwd = $data['password'];

        //MISSING PARAMETERS LIKE USER TYPE AND SO ON.
    }

    public function encryptPWD(){
        $this->pwd = password_hash($this->pwd, PASSWORD_DEFAULT);
    }

    public function comparePwd($email ,$pwd){
        try {

            $query = $this->prepare("call sp_compare_pwd(:email)");
            $query->execute(['email' => $email]);

            
            if( $row = $query->fetch(PDO::FETCH_ASSOC) ){
                return password_verify($pwd ,$row['PWD']);
            }

            return false;

        } catch (PDOException $e) {
            print_r( 'Something went wrong '.$e->getMessage());
            return false;
        }
    }

    public function serialize(){
        $data = [
            'email' => $this->email,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'phone' => $this->phone,
            'nickname' => $this->nickname,
            'type' => $this->type,
            'avatar' => base64_encode($this->avatar)/* ,
            'name' => $this->name,
            'lastName' => $this->lastName,
            'phone' => $this->nickname,
            'type' => $this->type,
            'nickname' => $this->nickname,
            'avatar' => $this->avatar */
        ];

        return $data;

    }

    public function encode(){
        return json_encode($this->serialize(), JSON_UNESCAPED_SLASHES);
    }

    public function decode(){

    }

    //GETTERS
    public function getEmail(){return $this->email;}
    public function getAvatar(){return $this->avatar;}
    public function getName(){return $this->name;}
    public function getLastname(){return $this->lastname;}
    public function getPhone(){return $this->phone;}
    public function getNickname(){return $this->nickname;}
    public function getType(){return $this->type;}

    //SETTERS
    public function setEmail($email){$this->email = $email;}
    public function setPassword($password){$this->pwd = $password;}
    public function setAvatar($avatar){$this->avatar = $avatar;}
    public function setName($name){$this->name = $name;}
    public function setLastname($lastname){$this->lastname = $lastname;}
    public function setPhone($phone){$this->phone = $phone;}
    public function setNickname($nickname){$this->nickname = $nickname;}
    public function setType($type){$this->type = $type;}


}

?>