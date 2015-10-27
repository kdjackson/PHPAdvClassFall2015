<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!-- The data encoding type, enctype, MUST be specified as below -->
        <form enctype="multipart/form-data" action="upload.php" method="POST">
            <!-- MAX_FILE_SIZE must precede the file input field -->
            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
            <!-- Name of input element determines name in $_FILES array -->
            Send this file: <input name="upfile" type="file" />
            <input type="submit" value="Send File" />
        </form>

        <!-- display imaged
        <img src="uploads/30420d1a9afb2bcb60335812569af4435a59ce17.jpg" /> -->
    </body>
</html>