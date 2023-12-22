<?php
require("fileupload.class.php");

// Now for usage
$file = $_FILES["file"]; 

// all the other attributes
$fileName = $file["name"];
$fileTmp = $file["tmp_name"]; 
$fileSize = $file["size"]; 
$fileErr = $file["error"];

$placeHolder = explode(".", $fileName); 
$fileExt = strtolower(end($placeHolder));

// Now create the object
$fileObj = new Fileupload_class($fileName, $fileExt, $fileErr, $fileSize, $fileTmp); 

if($fileObj->checkError() == true){
    echo "Error occured!";
    die();
}

if($fileObj->allowedExtensions() == false){
    echo "This extension is not allowed!";
    die();
}

if($fileObj->checkSize() == true){
    echo "This file is too big!";
    die();
}

// Now lets move the file!
$fileObj->moveFile();