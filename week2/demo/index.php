<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once './autoload.php';
        
        $validtor = new Validator();
        
        $phone = '555-999-8888';
        
        if ( $validtor->phoneIsValid($phone) ) {
            $message = 'Phone is Valid';
        } else {
            $message = 'Phone is NOT Valid';
        }
        
        ?>
        
        
        <?php if ( isset($message) ) : ?>
        <h2><?php echo $message; ?> </h2>
        <?php endif; ?>
        
        
    </body>
</html>
