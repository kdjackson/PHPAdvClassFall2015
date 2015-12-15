<?php require_once './autoload.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <?php
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $loginField = filter_input(INPUT_POST, 'login');

        $util = new Util();
        $validtor = new Validator();
        $login = new Login();

        $errors = array();

        if ($util->isPostRequest() && $loginField !== null) {

            if (!$validtor->emailIsValid($email)) {
                $errors[] = 'Email is not valid';
            }

            if (!$validtor->passwordIsValid($password)) {
                $errors[] = 'Password is not valid';
            }


            if (count($errors) <= 0) {

                $user_id = $login->verify($email, $password);

                if ($user_id > 0) {
                    $_SESSION['user_id'] = $user_id;
                    header('Location:add-image.php');
                } else {
                    $message = 'Login failed';
                }
            }
        }
        ?>

        <h1>Login Form</h1>
        <a href="./view.php">View images only</a> <br />

        <?php include './templates/login-form.html.php'; ?>
        <?php include './templates/errors.html.php'; ?>
        <?php include './templates/messages.html.php'; ?>

        <a href="./signup.php">Not a Member? Signup Here</a> <br />
        

    </body>
</html>
