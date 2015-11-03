<?php
require_once './autoload.php';

// put your code here
var_dump($_SESSION['user_id']);

$logout = filter_input(INPUT_GET, 'logout');

if ($logout == 1) {
    $_SESSION['user_id'] = null;
}

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
} else if (isset($_SESSION['user_id'])) {
    echo '<a href="?logout=1">Logout</a>';
    
}

?>  

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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

        

    </body>
</html>
