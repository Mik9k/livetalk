<?php

class Model{
    //TODO: implement database connection

    public $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function prepare($query){
        return $this->db->connect()->prepare($query);
    }

    public function query($query){
        return $this->db->connect()->query($query);
    }


}

?>