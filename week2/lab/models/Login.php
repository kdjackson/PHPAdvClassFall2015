<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author GFORTI
 */
class Login {
    //put your code here
    
    public function verify($email, $password) {
        
        $stmt = $this->getDb()->prepare("SELECT * FROM users WHERE email = :email, password = :password");
        
        $binds = array(
            ":email" => $email,
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
           $results = $stmt->fetch(PDO::FETCH_ASSOC);
           if (password_verify($password, $results['password']) ){
            return $results['user_id'];
           }
        }
        return 0;
    }
}
