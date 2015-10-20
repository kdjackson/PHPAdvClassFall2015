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
        
        $SESSION['flashmessages'] = array('testing' => 'FlashMessage Test');
        
        include './models/IMessage.php';
        include './models/MessageClass.php';
        include './models/FlashMessageClass.php';
        
        $flashMessage = new FlashMessageClass();
        
        $flashMessage->addMessage('test', 'my test message');
        
        var_dump($flashMessage->getAllMessages());
        echo '<br />';
        var_dump($flashMessage instanceof IMessage);
        echo '<br />';
        var_dump($flashMessage->removeMessage('test'));
        echo '<br />';
        var_dump($flashMessage->getAllMessages());
        ?>
        
    </body>
</html>
