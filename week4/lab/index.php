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

        <form enctype="multipart/form-data" action="upload.php" method="POST">

            Upload this file: <input name="upload" type="file" />
            <input type="submit" value="Upload File" />
            <br/>
            <a href="./view_uploads.php">View Uploaded Files</a>
            
        </form>

    </body>
</html>