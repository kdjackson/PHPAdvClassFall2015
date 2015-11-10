<!DOCTYPE html>
<?php
require_once './autoload.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>

    <h2>Uploaded Files</h2>
    <a href="index.php">Upload Files</a>
    <br />
    <br />
<?php

    $directory = scandir('./uploads');

    //var_dump($directory);
    
?>
    <table class="table"><thead><td>Filename</td>
    <td>File Type</td><td>File Size</td><td>Delete</td></thead>
<?php foreach ($directory as $file) : ?>
    <?php 
            $type = pathinfo($file)['extension'];
            $size = filesize('./uploads/'.$file);
    ?>
        <?php if (!is_dir($file)): ?>
    <tr>
        <td><a href="<?php echo './uploads'.DIRECTORY_SEPARATOR.$file?>"><?php echo $file?></a></td>
            
        <td><?php echo $type; ?></td>
            
        <td><?php echo $size; ?></td>
            
        <td><form action="#" method="POST">
                <button class="btn btn-primary" type="button">Delete File</button>
                <input type="hidden" value="<?php echo basename($file)?>" name="filename"/>
                
            </form>
        </td>
    </tr>

    <?php endif; ?>
<?php endforeach; ?>
</table>

</html>
