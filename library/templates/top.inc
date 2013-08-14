
<!DOCTYPE html>
<html>
    <head>
        <title><?PHP echo ucfirst($this->page); ?> Page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div id="container">
            <header>
                <h1>Welcome to MVC</h1>
                <nav>
                    <ul>
                        <li><a href="indexMVC.php?page=includeHome">Home</a></li>
                        <li><a href="indexMVC.php?page=about">About</a></li>
                    </ul>
                </nav>
            </header>
            <div id="content">