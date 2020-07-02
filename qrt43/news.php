<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../Api/vendor/autoload.php';

use FootballBlog\Processors\SessionManager;
use FootballBlog\Processors\PostsFunctions;

session_start();
$sessionHandle = new SessionManager();
$postsFunctions = new PostsFunctions();

$sessionID = $_SESSION['id'];

$postsOutput = json_decode($postsFunctions->fetchAllPublishedPosts(),true);
$outputCategories = json_decode($postsFunctions->fetchCategories(),true);
$recentPostsOutput = json_decode($postsFunctions->fetchRecentPublishedPosts(),true);


$postsCount = json_decode($postsFunctions->countPublishedPosts(),true);
$limit = 10;
$totalPages = ceil($postsCount["message"]/$limit);

if(isset($_GET["page"])){
    $currentPage = $_GET["page"];
}else{
    $currentPage = 0;
}

$startFrom = $currentPage * 10;
$endAt = $startFrom + 9;


if ($sessionHandle->checkSessionExists($sessionID) && isset($sessionID)){
    ?>
    <!DOCTYPE html>
    <html lang="zxx" class="no-js">
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
        <title>News - Dunda Football</title>

        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
        <!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href="css/linearicons.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/extras.css">
    </head>
    <body>

    <!-- Start Header Area -->
    <?php include_once 'admin-navbar.php';?>
    <!-- End Header Area -->

    <!-- Start top-section Area -->
    <section class="top-section-area section-gap">
        <div class="container">
            <div class="row justify-content-start align-items-center d-flex">
                <div class="col-lg-8 top-left">
                    <h1 class="text-white mb-20">News</h1>
                    <!--                <ul>-->
                    <!--                    <li><a href="index.html">Home</a><span class="lnr lnr-arrow-right"></span></li>-->
                    <!--                    <li><a href="category.html">Category</a><span class="lnr lnr-arrow-right"></span></li>-->
                    <!--                    <li><a href="single.html">Fashion</a></li>-->
                    <!--                </ul>-->
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
                <div class="row justify-content-center d-flex">
                    <div class="col-lg-8">
                        <div class="post-lists search-list">
                            <?php
                            $row = $postsOutput["data"];
                            for ($i=$startFrom;$i<$endAt;$i++){
                                if (array_key_exists($i,$row)){
                                    $convertDate = strtotime($row[$i]['post_date']);
                                    $day = date('j',$convertDate);
                                    $month = date('M',$convertDate);


                                    ?>
                                    <div class="single-list flex-row d-flex">
                                        <div class="thumb">
                                            <div class="date">
                                                <span><?=$day?></span><br><?=$month?>
                                            </div>
                                            <img width="197" height="182" src="<?=$row[$i]['image_url']?>" alt="">
                                        </div>
                                        <div class="detail">
                                            <a href="news-post.php?id=<?=$row[$i]['post_id']?>"><h4 class="pb-20"><?=$row[$i]['post_title']?></h4></a>
                                            <div class="sidebar-box-news">
                                                <p>
                                                    <?=$row[$i]['post_content']?>
                                                </p>
                                            </div>
                                            <p class="footer pt-20">
                                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                <a href="#">06 Likes</a>     <i class="ml-20 fa fa-comment-o" aria-hidden="true"></i> <a href="#">02 Comments</a>
                                            </p>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>


                            <div class="justify-content-center d-flex">
                                <?php
                                if(($currentPage+1) <$totalPages){
                                    $nextPage = $currentPage+1;
                                }else{
                                    $nextPage = $currentPage;
                                }?>
                                <a class="text-uppercase primary-btn loadmore-btn mt-40 mb-60" href="<?="news.php?page=".$nextPage?>"> Load More Post</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 sidebar-area">
                        <div class="single_widget search_widget">
                            <div id="imaginary_container">
                                <div class="input-group stylish-input-group">
                                    <input type="text" class="form-control"  placeholder="Search" >
                                    <span class="input-group-addon">
                                        <button type="submit">
                                            <span class="lnr lnr-magnifier"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="single_widget about_widget">
                            <img src="img/sample-profile_avatar.png" alt="" height="200">
                            <h2 class="text-uppercase">K-Links</h2>
                            <p>
                                Football fan, blogger and football analyst at Top 10 Betz.
                            </p>
                            <div class="social-link">
                                <a href="#"><button class="btn"><i class="fa fa-facebook" aria-hidden="true"></i> Like</button></a>
                                <a href="#"><button class="btn"><i class="fa fa-twitter" aria-hidden="true"></i> follow</button></a>
                            </div>
                        </div>
                        <div class="single_widget cat_widget">
                            <h4 class="text-uppercase pb-20">post categories</h4>
                            <ul>
                                <?php
                                foreach ($outputCategories['data'] as $row){
                                    ?>
                                    <li>
                                        <a href="#"><?=$row['category_name'];?><span></span></a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="single_widget recent_widget">
                            <h4 class="text-uppercase pb-20">Recent Posts</h4>
                            <div class="active-recent-carusel">
                                <?php
                                foreach ($recentPostsOutput["data"] as $row) {
                                    $convertDate = strtotime($row['post_date']);
                                    $mDate = date('d-M-Y', $convertDate);
                                    ?>
                                    <div class="item">
                                        <!--                                    <img src="../img/asset/slider.jpg" alt="">-->
                                        <img width="302" height="183"  src="<?=$row['image_url']?>" alt="">
                                        <p class="mt-20 title text-uppercase"><?= $row['post_title'] ?></p>
                                        <p><?= $mDate ?>
                                            <!--                                        <span> <i class="fa fa-heart-o" aria-hidden="true"></i>-->
                                            <!--                                    06 <i class="fa fa-comment-o" aria-hidden="true"></i>02</span>-->
                                        </p>
                                    </div>
                                    <?php
                                }
                                ?>

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

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/main.js"></script>
    </body>
    </html>

    <?php
}else{
    //Redirect to login page
    header("Location: login-page.php");
}
?>