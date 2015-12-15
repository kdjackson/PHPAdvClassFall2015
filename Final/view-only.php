<?php
require_once './autoload.php';

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



        <p><a href="./add-image.php">Home</a></p>
        <?php
        $util = new Util();

        if($util->isPostRequest()){
            $imagefile = filter_input(INPUT_POST, 'filename');
            $removefile = new Remove_file();
            //remove from folder
            $removefile->removeFile($imagefile);
            //removes from database
            $removefile->removeDbFile($imagefile);
            echo 'Image Deleted Successfully!';
        }
        $userImg = new GetUserImages();
    
        $userImg->getImages($_SESSION['user_id']);
        
        $results = array();
        $results = $userImg->getImages($_SESSION['user_id']);
        
//        $files = array();
        $directory = '.' . DIRECTORY_SEPARATOR . 'uploads/';
//        $dir = new DirectoryIterator($directory);
//        foreach ($dir as $fileInfo) {
//            if ($fileInfo->isFile()) {
//                $files[$fileInfo->getMTime()] = $fileInfo->getPathname();
//            }
//        }
//
//        krsort($files);
//ksort($files);
//view file
        

        foreach ($results as $result):
            ?> 
            <div class="meme"> 
                <img src="<?php echo $directory.$result['filename']; ?> " /> <br />
                <form action="#" method="POST">
                        <button class="btn btn-primary" type="submit">Delete File</button>
                        <input type="hidden" value="<?php echo $result['filename']; ?>" name="filename"/>

                    </form>

            </div>

        <?php endforeach; ?>



        <p><a href="./add-image.php">Home</a></p>
         Place this tag in your head or just before your close body tag. 
        <script src="https://apis.google.com/js/platform.js" async defer></script>


    </body>
</html>


