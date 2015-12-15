<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImageUpload
 *
 * @author 001348911
 */
class ImageUpload {
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
    
    public function saveimage($user_id, $filename) {
        
        $stmt = $this->getDb()->prepare("INSERT INTO photos set user_id = :user_id, filename = :filename, created = NOW()");
                
        $binds = array(
            ":user_id" => $user_id,
            ":filename" => $filename
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
           return true;
        }
        return false;  
    }
}
