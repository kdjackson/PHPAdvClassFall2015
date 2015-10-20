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
        <h1>Flash Message Test</h1>
        <div class="text-primary" style="font-size:20px; margin-left:20px;">
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
        </div>
        
    </body>
</html>
