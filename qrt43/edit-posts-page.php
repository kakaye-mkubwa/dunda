<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../Api/vendor/autoload.php';

use FootballBlog\Processors\PostsFunctions;
use FootballBlog\Processors\SessionManager;
use FootballBlog\Models\DataHandler;

session_start();
$sessionHandle = new SessionManager();
$dataHandle = new DataHandler();

if (isset($_GET['id']) && isset($_GET['user'])){
    $postID = $dataHandle->sanitizeData($_GET['id']);
    $userID = $dataHandle->sanitizeData($_GET['user']);
}


$sessionHandle->startSession($userID);
$_SESSION['id'] = $userID;

$postsFunctions = new PostsFunctions();
$outputPostDetails = json_decode($postsFunctions->fetchPostDetails($postID),true);
$outputCategories = json_decode($postsFunctions->fetchCategories(),true);

if ($sessionHandle->checkSessionExists($userID) && isset($_SESSION['id'])){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon-->
        <link rel="shortcut icon" href="../img/fav.png">
        <!-- Author Meta -->
        <!--    <meta name="author" content="colorlib">-->
        <!-- Meta Description -->
        <meta name="description" content="">
        <!-- Meta Keyword -->
        <meta name="keywords" content="">
        <!-- meta character set -->
        <meta charset="UTF-8">
        <!-- Site Title -->
        <title>Edit Post - Dunda Football</title>

        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
        <!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href="css/linearicons.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>

    <!-- Start Header Area -->
    <?php include_once 'admin-navbar.php';?>
    <!-- End Header Area -->

    <!-- Start top-section Area -->
    <section class="top-section-area section-gap">
        <div class="container">
            <div class="row justify-content-between align-items-center d-flex">
                <div class="col-lg-8 top-left">
                    <h1 class="text-white mb-20">Add Post</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End top-section Area -->


    <!-- Start post Area -->
    <div class="post-wrapper pt-100">
        <!-- Start post Area -->
        <section class="post-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="single-page-post">
                            <img class="img-fluid" src="../img/top10betzlogo.png" alt="">
                            <!--                        <div class="top-wrapper ">-->
                            <!--                            <div class="row d-flex justify-content-between">-->
                            <!--                                <h2 class="col-lg-8 col-md-12 text-uppercase">-->
                            <!--                                    A Discount Toner Cartridge Is Better Than Ever-->
                            <!--                                </h2>-->
                            <!--                                <div class="col-lg-4 col-md-12 right-side d-flex justify-content-end">-->
                            <!--                                    <div class="desc">-->
                            <!--                                        <h2>Mark wiens</h2>-->
                            <!--                                        <h3>12 Dec ,2017 11:21 am</h3>-->
                            <!--                                    </div>-->
                            <!--                                    <div class="user-img">-->
                            <!--                                        <img src="img/user.jpg" alt="">-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                        </div>-->
                            <!--                        <div class="tags">-->
                            <!--                            <ul>-->
                            <!--                                <li><a href="#">lifestyle</a></li>-->
                            <!--                                <li><a href="#">Art</a></li>-->
                            <!--                                <li><a href="#">Technology</a></li>-->
                            <!--                                <li><a href="#">Fashion</a></li>-->
                            <!--                            </ul>-->
                            <!--                        </div>-->
                            <div class="section-top-border">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8">
                                        <h3 class="mb-30">Add Post</h3>
                                        <form enctype="multipart/form-data">
                                            <?php
                                            foreach ($outputPostDetails["data"] as $rowPost){
                                            ?>
                                            <div class="mt-10">
                                                <label>Title
                                                    <input type="text" name="title" value="<?=$rowPost['post_title']?>" placeholder="Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required class="single-input">
                                                </label>
                                            </div>
                                            <div class="mt-10">
                                                <label>Description
                                                    <textarea type="text" name="description" style="height: 100px;" placeholder="Description" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input"><?=$rowPost['post_desc']?></textarea>
                                                </label>
                                            </div>

                                            <div class="input-group-icon mt-10" id="drop-down">
                                                <!--                                            <div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>-->
                                                <div class="form-select" id="default-select"">
                                                <label>Category
                                                    <select name="category">
                                                        <?php
                                                        foreach ($outputCategories["data"] as $row){
                                                            if ($row["category_name"] == $rowPost["category"]){
                                                                ?>
                                                                <option value="<?= $row["id"]?>" selected><?= $row["category_name"]?></option>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <option value="<?= $row["id"]?>" ><?= $row["category_name"]?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </label>
                                            </div>
                                    </div>

                                    <div class="mt-10">
                                        <!--                                            <textarea type="text" id="editor" class="single-textarea" style="height: 700px; width: 600px;" placeholder="Post Content" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required></textarea>-->
                                        <label>Content
                                            <textarea type="text" id="editor" name="content" placeholder="Post Content" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required><?=$rowPost['post_content']?></textarea>
                                        </label>
                                    </div>
                                    <input type="text" name="post" value="<?=$rowPost["post_id"]?>" style="display: none;">
                                    <div id="error-message"></div>
                                    <input id="submit-button" type="submit" value="Submit" class="primary-btn mt-20">
                                    <?php
                                    }
                                    ?>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </div>
    </section>
    <!-- End post Area -->
    </div>
    <!-- End post Area -->

    <!-- start footer Area -->
    <footer class="footer-area section-gap">
        <div class="container">

            <div class="row footer-bottom d-flex justify-content-between">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                <p class="col-lg-8 col-sm-12 footer-text">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <i class="fa " aria-hidden="true">Top 10 Betz</i></p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->

    <script src="js/vendor/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/main.js"></script>

    <!--Simditor-->
    <link rel="stylesheet" type="text/css" href="js/simditor-2.3.28/styles/simditor.css" />

    <!--<script type="text/javascript" src="../js/simditor-2.3.28//jquery.min.js"></script>-->
    <script type="text/javascript" src="js/simditor-2.3.28/site/assets/scripts/module.js"></script>
    <script type="text/javascript" src="js/simditor-2.3.28/site/assets/scripts/hotkeys.js"></script>
    <script type="text/javascript" src="js/simditor-2.3.28/site/assets/scripts/uploader.js"></script>
    <script type="text/javascript" src="js/simditor-2.3.28/lib/simditor.js"></script>
    <!--Simditor-->

    <script>
        $(document).ready(function () {
            var editor = new Simditor({
                textarea: $('#editor')
                //optional options
            });

            /*
            * title
            * description
            * category
            * content*/
            $('#submit-button').on('click',function (e) {
                e.preventDefault();

                $.ajax({
                    url: 'ajax/edit-posts-aj.php',
                    type: 'POST',
                    data: new FormData($('form')[0]),
                    cache:false,
                    contentType:false,
                    processData:false,

                    // Custom XMLHttpRequest
                    xhr: function () {
                        var myXhr = $.ajaxSettings.xhr();
                        if (myXhr.upload) {
                            // For handling the progress of the upload
                            myXhr.upload.addEventListener('progress', function (e) {
                                if (e.lengthComputable) {
                                    $('progress').attr({
                                        value: e.loaded,
                                        max: e.total,
                                    });
                                }
                            }, false);
                            myXhr.upload.addEventListener('load',function () {
                                $('#error-message').html('<hr><div class="alert alert-success"><p align="center"><strong>\n' +
                                    '                    <i class="fa info"></i> Success!</strong>\n' +
                                    '            </p></div>');
                                setTimeout(function() {
                                    location.reload();
                                }, 5000);
                            });
                        }
                        return myXhr;
                    }
                });
            });
        })
    </script>
    </body>
    </html>
    <?php
}else{
    //Redirect to login page
    header("Location: login-page.php");
}

?>
