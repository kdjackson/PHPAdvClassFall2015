<?php

/**
 * Description of Signup
 *
 * @author GFORTI
 */
class Signup {
    
    
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

    //check if the email exists
    public function emailExists($email) {
                
        $stmt = $this->getDb()->prepare("SELECT * FROM users WHERE email = :email");
                
        $binds = array(
            ":email" => $email
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
           return true;
        }
        return false;       
    }

    //save the email and hashed password
    public function save($email, $password) {
        
        $hash = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $this->getDb()->prepare("INSERT INTO users set email = :email, password = :password, created = now()");
                
        $binds = array(
            ":email" => $email,
            ":password" => $hash
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
           return true;
        }
        return false;
        
    }
}