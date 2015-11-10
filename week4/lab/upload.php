<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
    </head>
    <body>
        <?php
        /*
         * 
         * make sure php_fileinfo.dll extension is enable in php.ini
         */

        try {

            // Undefined | Multiple Files | $_FILES Corruption Attack
            // If this request falls under any of them, treat it invalid.
            if (!isset($_FILES['upload']['error']) || is_array($_FILES['upload']['error'])) {
                throw new RuntimeException('Invalid parameters.');
            }

            // Check $_FILES['upload']['error'] value.
            switch ($_FILES['upload']['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new RuntimeException('No file sent.');
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new RuntimeException('Exceeded filesize limit.');
                default:
                    throw new RuntimeException('Unknown errors.');
            }

            // Check filesize here. 
            if ($_FILES['upload']['size'] > 1000000) {
                throw new RuntimeException('Exceeded filesize limit.');
            }

            // DO NOT TRUST $_FILES['upload']['mime'] VALUE !!
            // Check MIME Type by yourself.
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $validExts = array(
                'txt' => 'text/plain',
                'html' => 'text/html',
                'pdf' => 'application/pdf',
                'doc' => 'application/msword',
                'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'xls' => 'application/vnd.ms-excel',
                'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif'
            );
            $ext = array_search($finfo->file($_FILES['upload']['tmp_name']), $validExts, true);


            if (false === $ext) {
                throw new RuntimeException('Invalid file format.');
            }

            // You should name it uniquely.
            // DO NOT USE $_FILES['upload']['name'] WITHOUT ANY VALIDATION !!
            // On this example, obtain safe unique name from its binary data.

            $fileName = sha1_file($_FILES['upload']['tmp_name']);
            $location = sprintf('./uploads/%s.%s', $fileName, $ext);

            if (!is_dir('./uploads')) {
                mkdir('./uploads');
            }

            if (!move_uploaded_file($_FILES['upload']['tmp_name'], $location)) {
                throw new RuntimeException('Failed to move uploaded file.');
            }

            echo 'File is uploaded successfully.';
            include 'index.php';
          
            
        } catch (RuntimeException $e) {

            echo $e->getMessage();
        }
        ?>
    </body>
</html>