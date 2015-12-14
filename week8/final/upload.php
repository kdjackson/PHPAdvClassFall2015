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
    if (!isset($_FILES['upfile']['error']) || is_array($_FILES['upfile']['error'])) {
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

// You should also check filesize here. 10mb
    if ($_FILES['upfile']['size'] > 10000000) {
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

    if (preg_match("/^(jpeg|jpg|png|gif)$/", $ext) == false) {
        throw new RuntimeException('Invalid file format.');
    }
    /* Alternative END */

// You should name it uniquely.
// DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
// On this example, obtain safe unique name from its binary data.

    $salt = uniqid(mt_rand(), true);
    $fileName = 'img_' . sha1($salt . sha1_file($_FILES['upfile']['tmp_name']));
    
    if (!is_dir('./uploads')) {
        mkdir('./uploads');
    }

    $location = sprintf('./uploads/%s.%s', $fileName, $ext);

    switch ($ext) {
        case "jpg" :
        case "jpeg" :
            $rImg = imagecreatefromjpeg($_FILES["upfile"]["tmp_name"]);
            break;
        case "gif" :
            $rImg = imagecreatefromgif($_FILES["upfile"]["tmp_name"]);
            break;
        case "png" :
            $rImg = imagecreatefrompng($_FILES["upfile"]["tmp_name"]);
            break;

        default :
            throw new RuntimeException("Error Bad Extention");
            break;
    }



    $image_info = getimagesize($_FILES["upfile"]["tmp_name"]);

    if (false === $image_info) {
        throw new RuntimeException('Invalid file format.');
    }


    $image_width = $image_info[0];
    $image_height = $image_info[1];


// Set a maximum height and width
    $max_width = 300;
    $max_height = 300;


    $ratio_orig = $image_width / $image_height;

    if ($max_width / $max_height > $ratio_orig) {
        $max_width = $max_height * $ratio_orig;
    } else {
        $max_height = $max_width / $ratio_orig;
    }

    $image_p = imagecreatetruecolor($max_width, $max_height);

    imagecopyresampled($image_p, $rImg, 0, 0, 0, 0, $max_width, $max_height, $image_width, $image_height);




    $memetop = filter_input(INPUT_POST, 'memetop');
    $memebottom = filter_input(INPUT_POST, 'memebottom');
//Font Color (white in this case)
    $textcolor = imagecolorallocate($image_p, 255, 255, 255);
    $bgcolor = imagecolorallocate($image_p, 0, 0, 0);

//y-coordinate of the upper left corner. 
    $yPos = intval($max_height - 20);

    if (null !== $memetop && strlen($memetop) > 0) {
//x-coordinate of center. 
        $xPosTop = intval(($max_width - 8.5 * strlen($memetop)) / 2);
// Set the background
        imagefilledrectangle($image_p, 0, 0, $max_width, 20, $bgcolor); // top
//Writting the picture
        imagestring($image_p, 5, $xPosTop, 0, $memetop, $textcolor);
    }

    if (null !== $memebottom && strlen($memebottom) > 0) {
//x-coordinate of center. 
        $xPosBottom = intval(($max_width - 8.5 * strlen($memebottom)) / 2);
// Set the background 
        imagefilledrectangle($image_p, 0, $yPos, $max_width, $max_height, $bgcolor); //bottom
//Writting the picture
        imagestring($image_p, 5, $xPosBottom, $yPos, $memebottom, $textcolor);
    }



    switch ($ext) {
        case "jpg" :
        case "jpeg" :
            if (!imagejpeg($image_p, $location)) {
                throw new RuntimeException('Failed to move uploaded file.');
            }
            break;
        case "gif" :
            if (!imagegif($image_p, $location)) {
                throw new RuntimeException('Failed to move uploaded file.');
            }
            break;
        case "png" :
            if (!imagepng($image_p, $location)) {
                throw new RuntimeException('Failed to move uploaded file.');
            }
            break;

        default :
            throw new RuntimeException("Error Bad Extention");
            break;
    }




    imagedestroy($rImg);
    imagedestroy($image_p);
    
   

    /*
      if ( !move_uploaded_file( $_FILES["upfile"]["tmp_name"], $location) ) {
        throw new RuntimeException('Failed to move uploaded file.');
      }

     */

    $message = 'File is uploaded successfully.';
} catch (RuntimeException $e) {

    $message = $e->getMessage();
    $status = 500;
    $location = '';
}


header("HTTP/1.1 " . $status . " " . $status_codes[$status]);

$response = array(
    "status" => $status,
    "status_message" => $status_codes[$status],
    "message" => $message,
    "location" => $location
);

echo json_encode($response);
die();

