<?php
class Post extends SessionController{
    public function __construct(){
        parent::__construct();

    }

    public function render(){
        $this->view->render('post/index');
    }
}
?>