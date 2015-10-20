<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        session_start();
        
//        $SESSION['flashmessages'] = array('testing' => 'FlashMessage Test');
        
        include './models/IMessage.php';
        include './models/MessageClass.php';
        include './models/FlashMessageClass.php';
        
        $flashMessage = new FlashMessageClass();
        
        $messages = $flashMessage->getAllMessages();
        
        print_r($messages);
        ?>
        
    </body>
</html>
