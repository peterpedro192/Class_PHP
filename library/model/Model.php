<?php
class Model{
    function __construct() {
        //normally where database connection goes, the controller queries the model which queries the database and sends back to content for view
    }
    
    public function getcontent($page='home'){
        switch($page){
            case "home":
                $this->content = '<p>This the content for the home page</p>'; //normally this content would be the output from the database query
                break;
             case "about":
                $this->content = '<p>This the content for the about page</p>'; //normally this content would be the output from the database query
                break;
             case "products":
                $this->content = array('Rackets','Clothing','Shuttle Cocks','Accesories'); //normally this content would be the output from the database query
                break;
             case "contact":
                $this->content = '<p>This the content for the contact page</p>'; //normally this content would be the output from the database query
                break;
        }
        
        return $this->content;
    }
}

