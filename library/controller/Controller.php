<?php
//This links the controller to the model page
require_once ('library/model/Model.php');
class Controller{
    
    function __construct() {
        $model = new Model();
        if(isset($_GET['page'])){
         //If page is set, choose a view, i.e when user clicks on a link
            $this->page= $_GET['page']; //this stores the name of the page to variable $this->page
            switch ($this->page) {
                case "home":
                    $this->maintext = $model->getcontent($this->page);
                    include ('library/view/home.phtml');
                    break;
                    
                case "about":
                    $this->maintext = $model->getcontent($this->page);
                    include ('library/view/about.phtml');
                    break;
                
                case "products":
                    $this->maintext = $model->getcontent($this->page);
                    include ('library/view/products.phtml');
                    break;
                    
                case "contact":
                    $this->maintext = $model->getcontent($this->page);
                    include ('library/view/contact.phtml');
                    break;

            }
          
        }else{
        //Defualt page shown by controller when no page selected, i.e user hasn't clicked on link yet
        $this->page= "home"; //give this variable a default value, otherwise it will be null until user clicks on link
        $this->maintext = $model->getcontent();
        include ('library/view/home.phtml');
    }
    
}

}
