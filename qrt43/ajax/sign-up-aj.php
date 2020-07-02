<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../../Api/vendor/autoload.php';

use FootballBlog\Models\DataHandler;
use FootballBlog\Processors\BloggersFunctions;
use FootballBlog\Processors\SessionManager;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $dataHandle = new DataHandler();
    $sessionManager = new SessionManager();

    $firstname = $dataHandle->sanitizeData($_POST['firstname']);
    $lastname = $dataHandle->sanitizeData($_POST['lastname']);
    $username = $dataHandle->sanitizeData($_POST['username']);
    $email = $dataHandle->sanitizeData($_POST['email']);
    $description = $dataHandle->sanitizeData($_POST['description']);
    $password = $dataHandle->sanitizeData($_POST['password']);

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
        $bloggerResponse = json_decode($bloggerFunctions->signUpAdmin($username,$password,$email,$firstname,$lastname,$description,$imageFile,$imageFileName,$baseDir),true);
        if ($bloggerResponse['error'] == 'false'){
            $memberID = json_decode($bloggerFunctions->getBloggerID($email),true);
//            echo $memberID['message'];
            session_start();
            $_SESSION['id'] = $memberID['id'];
            $sessionManager->startSession($memberID['id']);
            header("Location: ../index.php");
        }else{
            ?>
            <hr><div class="alert alert-danger"><p align="center"><strong>
                        <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
                    <?php echo $bloggerResponse["message"];?></p></div>
            <?php
        }
    }

}else{
    ?>
    <hr><div class="alert alert-danger"><p align="center"><strong>
                <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
            Ooops! Something went wrong</p></div>
    <?php
}
