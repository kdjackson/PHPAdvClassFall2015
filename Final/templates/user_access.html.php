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

        $user_id = $login->verify($emial, $password);
        
        if ($user_id > 0) {
            $_SESSION['user_id'] = $user_id;
            header('Location:add-image.php');
        } else {
            $message = 'Login failed';
        }
    }
}

$signupField = filter_input(INPUT_POST, 'signup');

$signup = new Signup();

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

include './templates/login-form.html.php';
include './templates/signup-form.php';
?>