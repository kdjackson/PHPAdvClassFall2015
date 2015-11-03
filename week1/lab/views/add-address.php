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
        require_once '../functions/dbconnect.php';
        require_once '../functions/util.php';

        $fullnameRegex = '/^[\\p{L} .-]+$/';
        $address1Regex = '/^\d{1,6}\040([A-Z]{1}[a-z]{1,}\040[A-Z]{1}[a-z]{1,})$|^\d{1,6}\040([A-Z]{1}[a-z]{1,}\040[A-Z]{1}[a-z]{1,}\040[A-Z]{1}[a-z]{1,})$|^\d{1,6}\040([A-Z]{1}[a-z]{1,}\040[A-Z]{1}[a-z]{1,}\040[A-Z]{1}[a-z]{1,}\040[A-Z]{1}[a-z]{1,})$/';
        $cityRegex = '/^[a-zA-Z]*$/';
        $stateRegex = '/^[a-zA-Z{2}]*$/';
        $zipRegex = '/^\d{5}(?:[-\s]\d{4})?$/';
        $isValid = true;


        $fullname = filter_input(INPUT_POST, 'fullname');
        $email = filter_input(INPUT_POST, 'email');
        $address1 = filter_input(INPUT_POST, 'address1');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $dob = filter_input(INPUT_POST, 'dob');


        if (isPostRequest()) {

            if (empty($fullname)) {
                $message = 'Sorry Fullname is Empty';
                $isValid = false;
            } else if (!preg_match($fullnameRegex, $fullname)) {
                $message = 'Fullname invalid';
                $isValid = false;
            }

            if (empty($email)) {
                $message = 'Sorry Email is Empty';
                $isValid = false;
            } else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                $message = 'Sorry Email is Invalid';
                $isValid = false;
            }

            if (empty($address1)) {
                $message = 'Sorry Address Line 1 is Empty';
                $isValid = false;
            } else if (!preg_match($address1Regex, $address1)) {
                $message = 'Address Line 1 is invalid';
                $isValid = false;
            }

            if (empty($city)) {
                $message = 'Sorry City is Empty';
                $isValid = false;
            } else if (!preg_match($cityRegex, $city)) {
                $message = 'City invalid';
                $isValid = false;
            }

            if (empty($state)) {
                $message = 'Sorry State is Empty';
                $isValid = false;
            } else if (!preg_match($stateRegex, $state)) {
                $message = 'State invalid';
                $isValid = false;
            }

            if (empty($zip)) {
                $message = 'Sorry Zip is Empty';
                $isValid = false;
            } else if (!preg_match($zipRegex, $zip)) {
                $message = 'Zip invalid';
                $isValid = false;
            }

            if (empty($dob)) {
                $message = 'Sorry Birthday is Empty';
                $isValid = false;
            }
        

        if ($isValid) {

            addAddress($fullname, $email, $address1, $city, $state, $zip, $dob);

                $message = 'Address Added';
                $fullname = '';
                $email = '';
                $address1 = '';
                $city = '';
                $state = '';
                $zip = '';
                $dob = '';
            }
        }



        include '../templates/message.php';
        ?>



        <?php
        if (!is_null($dob)) {
            echo date("F j, Y, g:i a", strtotime($dob));
        }
        ?>

        <div class="container">
            <h1>Add Address</h1>
            <form action="#" method="post">
                Full Name: <input name="fullname" value="<?php echo $fullname; ?>" /> <br />
                Email: <input name="email" value="<?php echo $email; ?>" /> <br />
                Address Line 1: <input name="address1" value="<?php echo $address1; ?>" /> <br />
                City: <input name="city" value="<?php echo $city; ?>" /> <br />
                State: <input name="state" value="<?php echo $state; ?>" /> <br />
                Zip: <input name="zip" value="<?php echo $zip; ?>" /> <br />
                Birthday: <input type="date" name="dob" value="<?php echo $dob; ?>" /> <br />
                <input type="submit" value="submit" class="btn btn-primary" />
                <br/>
                <a href="view-address.php">View Addresses</a>
            </form>
        </div>



    </body>
</html>
