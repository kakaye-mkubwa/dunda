<?php
include_once '../Api/vendor/autoload.php';

use FootballBlog\Processors\PostsFunctions;
use FootballBlog\Processors\SessionManager;
session_start();
$sessionHandle = new SessionManager();
//$sessionID = $_SESSION['id'];
$sessionID = $_SESSION['id'];

$postsFunctions = new PostsFunctions();
$outputCategories = json_decode($postsFunctions->fetchCategories(),true);

if ($sessionHandle->checkSessionExists($sessionID) && isset($sessionID)){
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
    <title>Add Post - Dunda Football</title>

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

                        <div class="section-top-border">
                            <div class="row">
                                <div class="col-lg-8 col-md-8">
                                    <h3 class="mb-30">Add Post</h3>
                                    <form method="post" id="signup-form" action="ajax/add-post-aj.php" enctype="multipart/form-data">
                                        <div class="mt-10">
                                            <input type="text" name="title" placeholder="Title" onfocus="this.placeholder = 'Title'" onblur="this.placeholder = 'Title'" required class="single-input">
                                        </div>
                                        <div class="mt-10">
                                            <textarea type="text" name="description" style="height: 100px;" placeholder="Description" onfocus="this.placeholder = 'Description'" onblur="this.placeholder = 'Description'" required class="single-input"></textarea>
                                        </div>
                                        <div class="mt-10">
                                            <input type="file" name="image" placeholder="Post Image" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
                                        </div>
                                        <div class="input-group-icon mt-10" id="drop-down">
<!--                                            <div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>-->
                                            <div class="form-select" id="default-select"">
                                                <select name="category">
                                                    <?php
                                                    foreach ($outputCategories["data"] as $row){
                                                        ?>
                                                        <option value="<?= $row["id"]?>"><?= $row["category_name"]?></option>
                                                        <?php
                                                    }
                                                    ?>
<!--                                                    <option value="1">..Categories..</option>-->
<!--                                                    <option value="1">Dhaka</option>-->
<!--                                                    <option value="1">Dilli</option>-->
<!--                                                    <option value="1">Newyork</option>-->
<!--                                                    <option value="1">Islamabad</option>-->
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mt-10">
<!--                                            <textarea type="text" id="editor" class="single-textarea" style="height: 700px; width: 600px;" placeholder="Post Content" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required></textarea>-->
                                            <textarea type="text" id="editor" name="post_content" placeholder="Post Content" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required></textarea>
                                        </div>
                                        <input type="text" name="blogger" value="<?php echo $sessionID?>" style="display: none;">

                                        <input type="submit" value="Submit" class="primary-btn mt-20">
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
