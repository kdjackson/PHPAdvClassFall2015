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
 * make sure php_fileinfo.dll extension is enable in php.ini
 */

try {
    
    // Undefined | Multiple Files | $_FILES Corruption Attack
    // If this request falls under any of them, treat it invalid.
    if ( !isset($_FILES['upfile']['error']) || is_array($_FILES['upfile']['error']) ) {       
        throw new RuntimeException('Invalid parameters.');
    }

    // Check $_FILES['upfile']['error'] value.
    switch ($_FILES['upfile']['error']) {
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
     
    // You should also check filesize here. 
    if ($_FILES['upfile']['size'] > 1000000) {
        throw new RuntimeException('Exceeded filesize limit.');
    }

    // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
    // Check MIME Type by yourself.
    /*
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $validExts = array(
                    'jpg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                );    
    $ext = array_search( $finfo->file($_FILES['upfile']['tmp_name']), $validExts, true );
    
    
    if ( false === $ext ) {
        throw new RuntimeException('Invalid file format.');
    }
    */
    
    /* Alternative to getting file extention */
    $name = $_FILES["upfile"]["name"]; 
    $ext = strtolower(end((explode(".", $name))));

    if ( preg_match("/^(jpeg|jpg|png|gif)$/", $ext) == false ) {
    throw new RuntimeException('Invalid file format.');
    }
    /* Alternative END */


    // You should name it uniquely.
    // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
    // On this example, obtain safe unique name from its binary data.
    
    $fileName =  sha1_file($_FILES['upfile']['tmp_name']); 
    $location = sprintf('./uploads/%s.%s', $fileName, $ext); 
        
    if ( !move_uploaded_file( $_FILES['upfile']['tmp_name'], $location) ) {
        throw new RuntimeException('Failed to move uploaded file.');
    }

    echo 'File is uploaded successfully.';

} catch (RuntimeException $e) {

    echo $e->getMessage();

}
?>
  </body>
</html>