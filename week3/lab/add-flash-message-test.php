<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        session_start();
                
        include './models/IMessage.php';
        include './models/MessageClass.php';
        include './models/FlashMessageClass.php';

        
        $message = new FlashMessageClass();
        
        $message->addMessage('test', 'my test message');
       
        var_dump($message instanceof IMessage);
        ?>
    </body>
</html>
