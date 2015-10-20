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
        include './models/ErrorMessageClass.php';
        
        $errorMessage = new ErrorMessageClass();
        
        $errorMessage->addMessage('test', 'my test message');
        
        var_dump($errorMessage->getAllMessages());
        echo '<br />';
        var_dump($errorMessage instanceof IMessage);
        echo '<br />';
        var_dump($errorMessage->removeMessage('test'));
        echo '<br />';
        var_dump($errorMessage->getAllMessages());

        
        ?>
    </body>
</html>
