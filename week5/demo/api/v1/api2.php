<?php
        
        include_once './models/Restserver.php';
        
        $restServer = new Restserver();
        
        try {
            
            $restServer-> setStatus(500);
            
        } catch (Exception $ex) {
            
            $restServer->setErrors($ex->getMessage());
            
        }

        $restServer->outputResponse();

