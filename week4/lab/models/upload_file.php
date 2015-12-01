<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of upload_file
 *
 * @author 001348911
 */
class upload_file {

    //put your code here
    private function isValidParams() {
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
    }

    private function isValidSize() {

        // Check filesize here. 
        if ($_FILES['upload']['size'] > 1000000) {
            throw new RuntimeException('Exceeded filesize limit.');
        }
    }

    private function isValidFile() {

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
    }

    private function nameFile() {
        // You should name it uniquely.
        // DO NOT USE $_FILES['upload']['name'] WITHOUT ANY VALIDATION !!
        // On this example, obtain safe unique name from its binary data.

        $fileName = sha1_file($_FILES['upload']['tmp_name']);
        $location = sprintf('./uploads/%s.%s', $fileName, $ext);

        $this->moveFile($location, 'upload');
    }

    private function moveFile() {
        if (!is_dir('./uploads')) {
            mkdir('./uploads');
        }

        if (!move_uploaded_file($_FILES['upload']['tmp_name'], $location)) {
            throw new RuntimeException('Failed to move uploaded file.');
        }
    }
    
    public function addFile() {
        isValidParams();
        isValidSize();
        isValidFile();
    }

}
