<?php
class File {

    private $videoName=null;
    function startsWith($haystack, $needle){
            $length = strlen($needle);
            return (substr($haystack, 0, $length) === $needle);
    }
    
    function uploadFile($file){
            $i = 1;
            for (;file_exists(sprintf("F:/game/%d/%d",1,$i)) == true;$i++);
            move_uploaded_file($file["tmp_name"],sprintf("F:/game/%d/%d",1,$i));
                $this->videoName= $i;
    }
    function getVideoName(){
            return $this->videoName;
    }
}