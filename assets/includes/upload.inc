<?php

//LOAD FILE BEGINS
//Calling function loads file, location and size
function movefile($original,$location,$size){
    //Set filename and remove path, set name to lowercase
    $filename= strtolower(basename($original['name']));
    //Start message - set file name with first letter uppercase
    $message= ucfirst($filename);
//LOAD FILE ENDS
    
//MOVE FILE BEGINS
    
    //Move file from local machine to server
    if(move_uploaded_file($original['tmp_name'], $location.'/'.$filename)){
        //Add to message that file has been uploaded
        $message.= " was  uploaded";
    }
//MOVE FILE ENDS
    
//RESIZE FILE BEGINS
    
    //Decide label for images depending on size
    if($size<=400){
        $label= "sml_";
    }else{
        $label= "lrg_";
    }
    
    //Set where to load image from on server and where to save to along with name
    $load= $location.'/'.$filename;
    $save= $location.'/'.$label.$filename;
    
    //Determine file type
    $ext= $_FILES['file']['type'];
    
    //Set how to open image depending on file type - default jpg
    switch($ext){
        case "image/png":
            $src= imagecreatefrompng($load);
            break;
        case "image/gif":
            $src= imagecreatefromgif($load);
            break;
        default:
            $src= imagecreatefromjpeg($load);
    }
    
    //Determine size of original image
    list($width,$height)= getimagesize($load);
    
    //Set new image size
    $newwidth= $size;
    $newheight= ($height/$width)*$newwidth;
    
    //Create canvas with new size
    $temp= imagecreatetruecolor($newwidth, $newheight);
    
    //Open original image and resize to new canvas
    imagecopyresampled($temp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    
    //Add to message that file has been rezised
    $message.= ", resized";
    
//RESIZE FILE ENDS
    
//SAVE FILE BEGINS
    
    //Determine how to save image into right format based on file type - default is jpg
    switch ($ext){
        case "image/png":
            imagepng($temp,$save,8);
            break;
        case "image/gif":
            imagegif($temp,$save);
            break;

        default:
            imagejpeg($temp,$save,80);
    }
    
    //Add to message that file has been saved
    $message.= " and saved successfully";
    
//SAVE FILE ENDS

//OUTPUT RESULT BEGINS
    
    return $message;
    
//OUTPUT RESULT BEGINS
    
}



