<?php

header("Access-Control-Allow-Orgin: *");
header("Content-Type: application/json; charset=utf8");

$status_codes = array(  
                    200 => 'OK',           
                    500 => 'Internal Server Error',
                );

$status = 200;

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

    // You should name it uniquely.
    // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
    // On this example, obtain safe unique name from its binary data.
    
    $fileName =  sha1_file($_FILES['upfile']['tmp_name']); 
    $location = sprintf('./uploads/%s.%s', $fileName, $ext); 
    
    if (!is_dir('./uploads')) {
        mkdir('./uploads');
    }
    
    if ( !move_uploaded_file( $_FILES['upfile']['tmp_name'], $location) ) {
        throw new RuntimeException('Failed to move uploaded file.');
    }

    $message = 'File is uploaded successfully.';

} catch (RuntimeException $e) {

    $message = $e->getMessage();
    $status = 500;

}


header("HTTP/1.1 " . $status . " " . $status_codes[$status]);

$response = array(
    "status" => $status,
    "status_message" => $status_codes[$status],
    "message" => $message    
);

echo json_encode($response, JSON_PRETTY_PRINT);