<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <h1>Success Message</h1>
            
        <div class="text-success" style="margin-left:20px; font-size:20px;">
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
        </div>
        
    </body>
</html>
