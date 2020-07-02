<?php
include_once '../Api/vendor/autoload.php';

use FootballBlog\Processors\SessionManager;
use FootballBlog\Processors\PostsFunctions;

session_start();
$sessionHandle = new SessionManager();
//$sessionID = $_SESSION['id'];
$sessionID = $_SESSION['id'];

$postFunctions = new PostsFunctions();

if ($sessionHandle->checkSessionExists($sessionID) && isset($sessionID)) {
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
        <title>Manage Categories - Dunda Football</title>

        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
        <!--
        CSS
        ============================================= -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
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
                    <h1 class="text-white mb-20">Manage Categories</h1>
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
                        </div>

                        <div class="single_widget cat_widget">
                            <h4 class="text-uppercase pb-20">post categories</h4>
                            <ul>
                                <?php
                                    $output = json_decode($postFunctions->fetchCategories(),true);
                                    if ($output["error"] == "false"){
                                        foreach ($output["data"] as $row){
                                            ?>
                                            <li>
                                                <p style="display: none" id="hidden-id"><?php echo $row["id"]?></p>
                                                <a href="#"><?php echo $row["category_name"];?> </a><span id="delete-category-span" class=" glyphicon glyphicon-trash">  37</span>
                                            </li>
                                            <?php
                                        }
                                    }
                                ?>

                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h4 class="mb-30">Add Category</h4>
                            <form action="#">
                                <div class="mt-10">
                                    <input type="text" name="category_name" placeholder="Category Name"
                                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Category Name'"
                                           required class="single-input">
                                </div>
                                <div id="error-message"></div>
                                <div class="mt-10">
                                    <input id="add-category-button" type="submit" value="Submit" class="primary-btn mt-20">
                                </div>
                            </form>
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
                <p class="col-lg-8 col-sm-12 footer-text">Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    All rights reserved <i class="fa " aria-hidden="true">Top 10 Betz</i></p>
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

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
            crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function () {
            $('#add-category-button').on('click',function (e){
                e.preventDefault();

                var category = $("input[name=category_name]").val();

                $.ajax({
                    url:"ajax/add-category-aj.php",
                    type:"POST",
                    data:{category:category}
                }).done(function(data){
                    $("#error-message").html(data);
                }).fail(function(xhr,status,error){
                    $('#error-message').html('<hr><div class="alert alert-warning"><p align="center"><strong><i class="fa fa-exclamation-triangle"></i> Oops!</strong> Something went wrong, Please try again... </p></div>');
                })
            })

            $('#delete-category-span').on('click',function (e) {
                e.preventDefault();

                var categoryID = $("#hidden-id").val();

                $.ajax({
                    url:"ajax/delete-category-aj.php",
                    type: "POST",
                    data:{category:categoryID}
                }).done(function (data) {
                    $("#error-message").html(data);
                }).fail(function (xhr,status,error) {
                    $('#error-message').html('<hr><div class="alert alert-warning"><p align="center"><strong><i class="fa fa-exclamation-triangle"></i> Oops!</strong> Something went wrong, Please try again... </p></div>');
                })
            })
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
