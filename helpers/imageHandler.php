<?php
require_once 'libs/iMedia.php';
class Image implements iMedia{

    public function __construct(){

    }

    function handler($mediaName){

        $fileName = $_FILES[$mediaName];

        if($this->fileExists($fileName)){

            if($this->getMediaType($mediaName) != 'image'){
                return false;
            }

            return file_get_contents($_FILES[$mediaName]['tmp_name']);
        }
        

    }

    function fileExists($file){
        return isset($file) && $file != '' ? true : false;
    }

    function getMediaType($mediaName){
        return reset(explode('/',$_FILES[$mediaName]['type']));
    }
}

?>