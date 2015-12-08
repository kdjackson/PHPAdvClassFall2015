<?php



try {
    
    
    $config = array(
        'DB_DNS' => 'mysql:host=localhost;port=3306;dbname=PHPAdvClassFall2015',
        'DB_USER' => 'root',
        'DB_PASSWORD' => ''
    );
    
    $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    
    
    
    if ( 'address' === $resource ) {
        
        if ( 'GET' === $verb ) {
            
            if ( NULL === $id ) {
                $stmt = $db->prepare("SELECT * FROM corp");
                
                if ($stmt->execute() && $stmt->rowCount() > 0) {
                    $response['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
            } else {
                $stmt = $db->prepare("SELECT * FROM corps where id = :id");
                $binds = array(":id" => $id);
                
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                    $response['data'] = $stmt->fetch(PDO::FETCH_ASSOC);
                } else {
                    throw new InvalidArgumentException('Corporation ID ' . $id . ' was not found');
                }
            }            
            
        }
                
        if ( 'POST' === $verb ) {
            $stmt = $db->prepare("INSERT INTO corps SET corp = :corp, email = :email, owner = :owner, phone = :phone, location = :location");
            $binds = array(
                ":corp" => $data['fullname'],
                ":email" => $data['email'],
                ":owner" => $data['addressline1'],
                ":phone" => $data['city'],
                ":location" => $data['state']
            );

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $response['message'] = 'Corporation Added';
                $status = 201;
            } else {
                throw new Exception('Corporation could not be added');
            }
        
        }
        
        
        if ( 'PUT' === $verb ) {
            
            if ( NULL === $id ) {
                throw new InvalidArgumentException('Corporation ID ' . $id . ' was not found');
            }
            
        }
        
    } else {
        throw new InvalidArgumentException($resource . ' Resource Not Found');
        //$response['errors'] = 'Resource Not Found';
        //$status = 404;
    }
    
    
    


} catch (InvalidArgumentException $e) {
    $response['errors'] = $e->getMessage();
    $status = 400;
} catch (Exception $e) {
    $response['errors'] = $e->getMessage();
    $status = 500;
}





