<?php

include_once '../../Api/vendor/autoload.php';

use FootballBlog\Models\DataHandler;
use FootballBlog\Processors\BloggersFunctions;

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $dataHandle = new DataHandler();
    $title = $dataHandle->sanitizeData($_POST["title"]);
    $description = $dataHandle->sanitizeData($_POST["description"]);
    // $postContent = $dataHandle->sanitizeDescription($_POST["post_content"]);
    $postContent = $_POST["post_content"];
    $bloggerID = $dataHandle->sanitizeData($_POST["blogger"]);
    $postCategory = $dataHandle->sanitizeData($_POST["category"]);
    $imageFile = $dataHandle->sanitizeData($_FILES["image"]["tmp_name"]);
    $imageName = $dataHandle->sanitizeData($_FILES["image"]["name"]);
    $imageSize = $dataHandle->sanitizeData($_FILES["image"]["size"]);
    $imageFileExtension = pathinfo($imageName,PATHINFO_EXTENSION);

    $dir = __DIR__;
    $baseDir = substr($dir,0,26);
    // $baseDir = substr($dir,0,51);

    if (!in_array($imageFileExtension,['png','jpeg','jpg','gif'])){
        ?>
        <hr><div class="alert alert-danger"><p align="center"><strong>
                    <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
                <?php echo "Image file extension not accepted";?></p></div>
        <?php
    }elseif ($imageSize > 10000000){

        ?>
        <hr><div class="alert alert-danger"><p align="center"><strong>
                    <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
                <?php echo "Image file should not be more than 10MB";?></p></div>
        <?php
    }else{

        $bloggerFunctions = new BloggersFunctions();
        $addingResponse = json_decode($bloggerFunctions->addPost($title,$description,$postContent,$bloggerID,$postCategory,$imageFile,$imageName,$baseDir),true);

        if ($addingResponse['error'] == 'false'){
            header("Location: ../manage-posts.php");
        }else{
            ?>
            <hr><div class="alert alert-danger"><p align="center"><strong>
                        <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
                    <?php echo $addingResponse["message"];?></p></div>
            <?php
        }
    }

}
