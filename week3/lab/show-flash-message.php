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
        <h1>Show Flash Message</h1>
        <div class="text-primary" style="font-size:20px; margin-left:20px;">
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
        </div>
        
    </body>
</html>
