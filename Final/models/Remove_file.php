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
    private $db;

    function __construct() {
        
        $util = new Util();
        $dbo = new DB($util->getDBConfig());
        $this->setDb($dbo->getDB());        
    }

    private function getDb() {
        return $this->db;
    }

    private function setDb($db) {
        $this->db = $db;
    }
    
    public function removeFile($file) {
        unlink('./uploads/'.$file);
    }
    
    public function removeDbFile($file) {
        $stmt = $this->getDb()->prepare("DELETE FROM photos WHERE filename = :filename");
        
        $binds = array(
            ":filename" => $file
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
           return true;
        }
        return false;
    }
    
}
