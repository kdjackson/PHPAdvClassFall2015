<?php
/**
 * Function to extablish a databse connection
 * 
 * @return PDO Object
 */  
function dbconnect() {
    $config = array(
        'DB_DNS' => 'mysql:host=localhost;port=3307;dbname=PHPAdvClassFall2015',
        'DB_USER' => 'root',
        'DB_PASSWORD' => ''
    );

    try {
        /* Create a Database connection and 
         * save it into the variable */
        $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (Exception $ex) {
        /* If the connection fails we will close the 
         * connection by setting the variable to null */
        $db = null;
        $message = $ex->getMessage();
        var_dump($message);
        exit();
    }

    return $db;
}