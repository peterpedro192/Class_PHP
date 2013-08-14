
<!DOCTYPE html>
<html>
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div id="container">
            <header>
                <h1>Welcome to MVC</h1>
                <nav>
                    <ul>
                        <li><a href="indexMVC.php?page=home">Home</a></li>
                        <li><a href="indexMVC.php?page=about">About</a></li>
                    </ul>
                </nav>
            </header>
            <div id="content">
                <h2>Welcome to <?PHP echo $this->page; ?> Page</h2>
                <?PHP echo $this->maintext; ?>
            </div>
            
                        <footer>
                <nav>
                    <ul>
                       <li><a href="indexMVC.php?page=home">Home</a></li>
                        <li><a href="indexMVC.php?page=about">About</a></li> 
                    </ul>
                </nav>
            </footer>
        </div>
    </body>
</html>

