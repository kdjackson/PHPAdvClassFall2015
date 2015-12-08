<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of delete_file
 *
 * @author 001348911
 */
class Delete_file {
    
    public function deleteFile($file){
        unlink('./uploads/'.$file);
        echo 'File deleted successfully';
    }
    
    
}
