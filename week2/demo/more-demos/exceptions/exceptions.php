<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        
        /*
         * Exceptions are used for handling program failures.
         * 
         * You can throw exceptions and use try catch block to catch and handle the failure.
         */
        
        function load_lib($class) {
            include $class . '.php';
        };
        spl_autoload_register('load_lib');
        
        //http://php.net/manual/en/language.exceptions.php
        
        
        
        try {
           throw new Exception('I am an exception.');
           
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            
        }
        
        
        
        try {
            $dbConfig = array(
                "DB_DNS"=>'',
                "DB_USER"=>'',
                "DB_PASSWORD"=>''
            );
           $db = new DB($dbConfig);
           $pdo = $db->getDB();
           
        } catch (DBException $e) {
            echo '<br /> Caught DBException: ',  $e->getMessage(), "\n";
        }
        
      
        
        
        
        
        ?>
    </body>
</html>
