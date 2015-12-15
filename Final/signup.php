<?php require_once './autoload.php'; ?>
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
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $signupField = filter_input(INPUT_POST, 'signup');


        $util = new Util();
        $validtor = new Validator();
        $signup = new Signup();

        $errors = array();

        if ($util->isPostRequest() && $signupField !== null) {

            if (!$validtor->emailIsValid($email)) {
                $errors[] = 'Email is not valid';
            }

            if (!$validtor->passwordIsValid($password)) {
                $errors[] = 'Password is not valid';
            }

            if ($signup->emailExists($email)) {
                $error[] = 'Email already exists';
            }

            if (count($errors) <= 0) {

                if ($signup->save($email, $password)) {
                    $message = 'Signup complete';
                } else {
                    $message = 'Signup failed';
                }
            }
        }
        ?>




        <h1>Signup Form</h1>

        <?php include './templates/signup-form.php'; ?>
        <?php include './templates/errors.html.php'; ?>
        <?php include './templates/messages.html.php'; ?>


        <a href="index.php">Already a Member? Login Here</a> <br />

    </body>
</html>
