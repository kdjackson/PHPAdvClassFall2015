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
        <?php
        // put your code here
        
        require_once './functions/dbconnect.php';
        require_once './functions/until.php';
        
        
        $phone = filter_input(INPUT_POST, 'phone');
        $phoneType = filter_input(INPUT_POST, 'phonetype');
        
        $phones = getAllPhone();
        
        if ( isPostRequest() ) {
            
            
            if ( empty($phone) ) {
                $message = 'Sorry Phone is Empty';
            } else if ( empty($phoneType) ) {
                $message = 'Sorry Phone Type is Empty';
            } else if ( addPhone($phone, $phoneType ) ) {
                $message = 'Phone Added';
                $phone = '';
                $phoneType = '';
            }
            
            
        }
                
                
        include './templates/messages.html.php';
        include './templates/phone-form.html.php';
        
        include './templates/view-phones.html.php';
        ?>
        
        
        
    </body>
</html>
