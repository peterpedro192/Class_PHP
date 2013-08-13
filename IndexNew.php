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
             include('library/Upload.php');
             $tuesdayWeb = new Upload($_FILES['file'],"images",400);
             $tuesdayWeb->resizeimage();
             $tuesdayWeb->resizeimage(800);
             echo $tuesdayWeb->message;
            }
            
            
         ?>
        
         <form action="IndexNew.php" method="post" enctype="multipart/form-data">
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
