<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Error Message</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <h1>Error Message</h1>
        <div class="text-danger" style="font-size: 20px; margin-left:20px;">
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
        </div>
    </body>
</html>
