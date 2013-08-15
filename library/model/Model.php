<?php
class Model{
    function __construct() {
        //normally where database connection goes, the controller queries the model which queries the database and sends back to content for view
        //Database Connection
        try{
            $this->connection= new PDO("mysql:host=localhost;dbname=shop_db", "root", "");
        }  catch (PDOException $error){
            print $error->getMessage();
        }
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
                //$this->content = array('Rackets','Clothing','Shuttle Cocks','Accesories'); //normally this content would be the output from the database query
                 $this->content = $this->getcategories();
                 //$this->content = $this->getmanufacturers();
                 //$this->content = $this->getproducts();
                 break;
             case "contact":
                $this->content = '<p>This the content for the contact page</p>'; //normally this content would be the output from the database query
                break;
        }
        
        return $this->content;
    }
    
    public function getcategories(){
            //Separating the business logic out, so put this in its own function (which can be reused), then call function where needed, e.g products
           //$this->content = array('Rackets','Clothing','Shuttle Cocks','Accesories'); //normally this content would be the output from the database query
                $this->query = "SELECT * FROM `shop_db`.`categories`";//using sql to query datatbase, selects everthing from categories table
                $this->result =  $this->connection->prepare($this->query);//must prepare the connection before executing
                $this->result->execute(); //returns everything, including data we don't need
                return $this->result->fetchAll();//what returns is an associative array of text that PHP can use
                 
    }
    public function getmanufacturers(){
            //Separating the business logic out, so put this in its own function (which can be reused), then call function where needed, e.g products
           //$this->content = array('Rackets','Clothing','Shuttle Cocks','Accesories'); //normally this content would be the output from the database query
                $this->query = "SELECT * FROM `shop_db`.`manufacturers`";//using sql to query datatbase, selects everthing from categories table
                $this->result =  $this->connection->prepare($this->query);//must prepare the connection before executing
                $this->result->execute(); //returns everything, including data we don't need
                return $this->result->fetchAll();//what returns is an associative array of text that PHP can use
                 
    }
    public function getproducts(){
            //Separating the business logic out, so put this in its own function (which can be reused), then call function where needed, e.g products
           //$this->content = array('Rackets','Clothing','Shuttle Cocks','Accesories'); //normally this content would be the output from the database query
                $this->query = "SELECT * FROM `shop_db`.`products`";//using sql to query datatbase, selects everthing from categories table
                $this->result =  $this->connection->prepare($this->query);//must prepare the connection before executing
                $this->result->execute(); //returns everything, including data we don't need
                return $this->result->fetchAll();//what returns is an associative array of text that PHP can use
                 
    }
}

