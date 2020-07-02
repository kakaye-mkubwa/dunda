<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../../Api/vendor/autoload.php';

use FootballBlog\Models\DataHandler;
use FootballBlog\Processors\BloggersFunctions;
use FootballBlog\Processors\SessionManager;

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $dataHandle = new DataHandler();
    $sessionManager = new SessionManager();

    $userID = $dataHandle->sanitizeData($_POST['blogger']);
    $postID = $dataHandle->sanitizeData($_POST['post']);
    $imageFile = $dataHandle->sanitizeData($_FILES['image']['tmp_name']);
    $imageFileName = $dataHandle->sanitizeData($_FILES['image']['name']);
    $imageFileSize = $dataHandle->sanitizeData($_FILES['image']['size']);
    $imageFileExtension = pathinfo($imageFileName,PATHINFO_EXTENSION);

    $dir = __DIR__;
    $baseDir = substr($dir,0,26);
    // $baseDir = substr($dir,0,51);

    if (!in_array($imageFileExtension,['png','jpeg','jpg','gif'])){
        ?>
        <hr><div class="alert alert-danger"><p align="center"><strong>
                    <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
                <?php echo "Image file extension not accepted";?></p></div>
        <?php
    }elseif ($imageFileSize > 10000000){

        ?>
        <hr><div class="alert alert-danger"><p align="center"><strong>
                    <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
                <?php echo "Image file should not be more than 10MB";?></p></div>
        <?php
    }else{

        $bloggerFunctions = new BloggersFunctions();
        $bloggerResponse = json_decode($bloggerFunctions->changePostImage($postID,$imageFile,$imageFileName,$baseDir),true);
        if ($bloggerResponse['error'] == 'false'){
//            echo $memberID['message'];
            session_start();
            $_SESSION['id'] = $userID;
            $sessionManager->startSession($userID);
            header("Location: ../manage-posts.php");
        }else{
            ?>
            <hr><div class="alert alert-danger"><p align="center"><strong>
                        <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
                    <?php echo $bloggerResponse["message"];?></p></div>
            <?php
        }
    }
}
