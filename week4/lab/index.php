<?php
require_once './autoload.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Upload File</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <h2>Upload File</h2>

        <form enctype="multipart/form-data" action="#" method="POST">

            Upload this file: <input name="upload" type="file" />
            <input type="submit" value="Upload File" />
            <br/>
            
            
        </form>
        <a href="./view_uploads.php">View Uploaded Files</a> <br/>
        <?php
        
        $util = new Util();
        $errors = array();
        
        if ($util->isPostRequest()){
            try {
                $upload = 'upload';
                $fileuploaded = new Upload_file();              
                $fileuploaded->addFile($upload);
                $message = 'File uploaded successfully';
            } catch (Exception $ex) {
                    $errors[] = $ex->getMessage();
            }
        }
        
        ?>
        
        <?php include './templates/errors.html.php'; ?>
        <?php include './templates/messages.html.php'; ?>
    </body>
</html>