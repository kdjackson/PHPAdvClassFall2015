<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of remove_file
 *
 * @author 001348911
 */
class Remove_file {
    //put your code here
    public function removeFile($file) {
        unlink('./uploads/'.$file);
    }
    
}
