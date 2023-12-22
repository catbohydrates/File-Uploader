<?php
// All the variables needed

class Fileupload_class{
    private $fileName; 
    private $fileExt; 
    private $fileErr; 
    private $fileSize; 
    private $fileTmp; 

    public function __construct($fileName, $fileExt, $fileErr, $fileSize, $fileTmp){
        $this->fileName = $fileName; 
        $this->fileExt = $fileExt; 
        $this->fileErr = $fileErr; 
        $this->fileSize = $fileSize; 
        $this->fileTmp = $fileTmp; 
    }

    // Lets check for some things
    public function allowedExtensions(){
        // The allowed extensions
        $allowedExt = array("exe", "png", "jfif", "jpeg", "mp4", "mp3", "jpg"); 

        // Check to see if $this->fileExt is in this array
        if(in_array($this->fileExt, $allowedExt)){
            // if its in the array, we will return true
            return true;
        }
        return false; // return false if it isn't
    }

    public function checkSize(){
        // Check the size of the file
        $maxSize = 500000000; // this is 500mb in bytes. 500mb = 5e8 bytes

        if($this->fileSize > $maxSize){
            return true; // return true if the file size is above 500mb
        }
        return false; // return false if it doesn't go over the limit
    }

    public function checkError(){
        // Check to see if the error is above the value 0, if it isn't, nothing is wrong
        if($this->fileErr !== 0){
            return true; // return true if the error is NOT 0
        }
        return false; // return false if it is above 0
    }

    public function moveFile(){
        // First, lets get a unique file name
        $newFileName = uniqid($this->fileExt, true) . "." . $this->fileExt; 
        // Then lets get the path of whatever directory we want to store our files in
        $path = "C:\Users\Koopa\Desktop" . "\\" . $newFileName; // for me ill store on the desktop

        if(move_uploaded_file($this->fileTmp, $path)){
            echo "Uploaded";
        }
        else{
            echo "failed!";
        }

    }
}