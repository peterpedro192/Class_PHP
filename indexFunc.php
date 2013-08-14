<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Function Image Resize</title>
    </head>
    <body>
        <?php
        // put your code here
  
        
         if(isset($_POST['submit'])){
             include('assets/includes/upload.inc');
             echo movefile($_FILES['file'], "images", 400);
             echo movefile($_FILES['file'], "images", 800);
         }
         ?>
        
         <form action="index.php" method="post" enctype="multipart/form-data">
            <p>
                Please select file:
                <input type="file" name="file" id="file" />
            </p>
            <p>
                <input type="submit" name="submit" value="Upload File" />
            </p>
        </form>
        
              
        
    </body>
</html>
