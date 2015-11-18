<?php

/**
 * Description of util
 *
 * @author GFORTI
 */
class Util {
    
    
    /**
    * A method to check if a Post request has been made.
    *    
    * @return boolean
    */
   public function isPostRequest() {
       return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
   }
   
   
   public function getDBConfig() {
       return array(
            'DB_DNS' => 'mysql:host=localhost;port=3306;dbname=PHPAdvClassFall2015',
            'DB_USER' => 'root',
            'DB_PASSWORD' => ''
        );       
   }

    
}
