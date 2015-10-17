<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /*
         * You can create an email model to set the values and have a function or class access those values
         */
         include './EmailModel.php';
         
         $emailmodel = new EmailModel();
         $emailmodel->setEmail('test@test.com');
         
         echo $emailmodel->getEmail();
         
        ?>
    </body>
</html>
