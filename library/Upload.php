<?php

class Upload{
    //NOTE - the construct are those parts of the class that are done immediatedly and that are always done in the class
    //A good example is a database, all of the actions to access the database, which always must be done to do anything with the
    //database
    function __construct($original,$destination,$size) {
    $this->original = $original;
    $this->destination = $destination;
    $this->size = $size;
    $this->filename = strtolower(basename($this->original['name']));
    $this->message = ucfirst($this->filename);
    }
    
    
    function movefile(){
        
          if(move_uploaded_file($this->original['tmp_name'], $this->destination.'/'.$this->filename)){
              $this->message.= " has been moved,";
            }
        
    }
    
    function resizeimage($newsize=null){
        $this->movefile();
        
        $this->loadimage = $this->destination.'/'.$this->filename;
        if(!empty($newsize)){
            $this->size= $newsize;
        }
        if($this->size<=400){
            $this->label = "sml_";
        }else{
            $this->label = "lrg_";
        }
        
        $this->ext = $this->original['type'];
        switch ($this->ext){
            case "image/png":
                $this->src = imagecreatefrompng($this->loadimage);
                break;
            case "image/gif":
                $this->src = imagecreatefromgif($this->loadimage);
                break;
            default:
                $this->src = imagecreatefromjpeg($this->loadimage);
        }
        
        
        
            //Determine size of original image
        list($this->width,  $this->height)= getimagesize($this->loadimage);

        //Set new image size
        $this->newwidth= $this->size;
        $this->newheight= ($this->height/  $this->width)*  $this->newwidth;

        //Create canvas with new size
        $this->canvas= imagecreatetruecolor($this->newwidth, $this->newheight);

        //Open original image and resize to new canvas
        imagecopyresampled($this->canvas, $this->src, 0, 0, 0, 0, $this->newwidth, $this->newheight, $this->width, $this->height);
        
        
         //Add to message that file has been rezised
         $this->message.= ", resized";
         $this->savefile();
        
    }
    
    
    function savefile(){
        
        $this->saveimage = $this->destination.'/'.$this->label.$this->filename;
        //Determine how to save image into right format based on file type - default is jpg
        switch ($this->ext){
            case "image/png":
                imagepng($this->canvas,  $this->saveimage,8);
                break;
            case "image/gif":
                imagegif($this->canvas,  $this->saveimage);
                break;

            default:
                imagejpeg($this->canvas,  $this->saveimage,80);
        }
        
        //Add to message that file has been saved
        $this->message.= " and saved successfully";
    }
    

    
}

