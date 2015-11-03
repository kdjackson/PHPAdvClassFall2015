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
        
        $addresses = getAllAddresses();
        
        if (getAllAddresses() ){
            echo '<h1>' . 'Address List' . '</h1>';
            echo '<table class="table">';
            echo '<tr>';
            echo '<th>' . 'Fullname' . '</th>';
            echo '<th>' . 'Email' . '</th>';
            echo '<th>' . 'Address Line 1' . '</th>';
            echo '<th>' . 'City' . '</th>';
            echo '<th>' . 'State' . '</th>';
            echo '<th>' . 'Zip' . '</th>';
            echo '<th>' . 'Birthday' . '</th>';
            echo '</tr>';
            foreach ($addresses as $value) {
                echo '<tr>';
                echo '<td>' . $value["fullname"] . '</td>';
                echo '<td>' . $value["email"] . '</td>';
                echo '<td>' . $value["addressline1"] . '</td>';
                echo '<td>' . $value["city"] . '</td>';
                echo '<td>' . $value["state"] . '</td>';
                echo '<td>' . $value["zip"] . '</td>';
                echo '<td>' . $value["birthday"] . '</td>';
            }

            echo '</table>';
        } else {
            echo 'No Results Found';
        }
        ?>
        <a href="add-address.php">Add Address</a>
    </body>
</html>
