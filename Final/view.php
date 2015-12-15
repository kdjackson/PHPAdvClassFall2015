
<?php
//require_once './autoload.php';
//include './templates/user_access.html.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>View Page</title>
        <style>
            .meme {
                width: 300px; 
                border: 1px solid silver;
                padding: 0.5em;
                text-align: center;
                margin: 0.5em;
                vertical-align: middle;
            }



        </style>
    </head>
    <body>
        <?php include './templates/errors.html.php'; ?>
        <?php include './templates/messages.html.php'; ?>

        <!--for facebook share-->
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        <?php
//        $logout = filter_input(INPUT_GET, 'logout');
//
//        if ($logout == 1) {
//            $_SESSION['user_id'] = null;
//        }
//
//        if (!isset($_SESSION['user_id'])) {
//            header('Location: index.php');
//        } else if (isset($_SESSION['user_id'])) {
//            echo '<a href="?logout=1">Logout</a>';
//        }
        ?>


        <p><a href="./add-image.php">Home</a></p>
        <?php
        $files = array();
        $directory = '.' . DIRECTORY_SEPARATOR . 'uploads';
        $dir = new DirectoryIterator($directory);
        foreach ($dir as $fileInfo) {
            if ($fileInfo->isFile()) {
                $files[$fileInfo->getMTime()] = $fileInfo->getPathname();
            }
        }

        krsort($files);
//ksort($files);
//view file
        foreach ($files as $key => $path):
            ?> 
            <div class="meme"> 
                <img src="<?php echo $path; ?>" /> <br />
                <?php echo date("l F j, Y, g:i a", $key); ?>
                <!-- Place this tag where you want the share button to render. -->
                <div class="g-plus" data-action="share" data-href="<?php echo $path; ?>"></div> 
                <div class="mail"><a href='mailto:?subject=Check out this image&amp;body=Check out this awesome image I found" . <?php echo $path; ?> "' title="Share by Email">
                        <img src="http://png-2.findicons.com/files/icons/573/must_have/48/mail.png">
                    </a></div>
                <div class="fb-share-button" data-href="<?php echo $path; ?>" data-layout="button_count"></div>

            </div>

        <?php endforeach; ?>



        <p><a href="./add-image.php">Home</a></p>
        <!-- Place this tag in your head or just before your close body tag. -->
        <script src="https://apis.google.com/js/platform.js" async defer></script>


    </body>
</html>