<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        include './models/IMessage.php';
        include './models/MessageClass.php';
        include './models/SuccessMessageClass.php';
        
        $successMessage = new SuccessMessageClass();
        
        $successMessage->addMessage('test', 'my test message');
        
        var_dump($successMessage->getAllMessages());
        echo '<br />';
        var_dump($successMessage instanceof IMessage);
        echo '<br />';
        var_dump($successMessage->removeMessage('test'));
        echo '<br />';
        var_dump($successMessage->getAllMessages());
        ?>
        
    </body>
</html>
