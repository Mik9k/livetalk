<?php

interface iMedia{

    public function handler($mediaName);
    public function getMediaType($mediaName);
    public function fileExists($file);

}

?>