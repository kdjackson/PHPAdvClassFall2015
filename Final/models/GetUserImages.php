<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GetUserImages
 *
 * @author 001348911
 */
class GetUserImages {
    //put your code here
    
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
    
    public function getImages($user_id){
        
        $results = array();
        $stmt = $this->getDb()->prepare("SELECT * FROM photos WHERE user_id = :user_id");
        $binds = array(
            ":user_id" => $user_id,
        );
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
           $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
           return $results;
        }

    }
}
