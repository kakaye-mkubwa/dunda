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

$recentPostsOutput = json_decode($postsFunctions->fetchRecentPublishedPosts(),true);
$trendingPostsOutput = json_decode($postsFunctions->fetchTrendingPosts(),true);
$rowTrend = $trendingPostsOutput['data'];


$topPostData = $recentPostsOutput['data'][0];

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
    <!--		<meta name="author" content="colorlib">-->
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Admin - Dunda Football</title>

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
    <link rel="stylesheet" href="css/extras.css">
</head>
<body>

<!-- Start Header Area -->
<?php include_once 'admin-navbar.php';?>
<!-- End Header Area -->

<!-- start banner Area -->
<section class="banner-area relative" id="home" data-parallax="scroll" data-image-src="../img/header-bg.jpg">
    <div class="overlay-bg overlay"></div>
    <div class="container">
        <div class="row fullscreen">
            <div class="banner-content d-flex align-items-center col-lg-12 col-md-12">
                <a href="news-post.php?id=<?=$topPostData['post_id']?>">
                    <h1>
                        <?=$topPostData['post_title']?>
                    </h1>
                </a>
            </div>
            <div class="head-bottom-meta d-flex justify-content-between align-items-end col-lg-12">
<!--                <div class="col-lg-6 flex-row d-flex meta-left no-padding">-->
<!--                    <p><span class="lnr lnr-heart"></span> 15 Likes</p>-->
<!--                    <p><span class="lnr lnr-bubble"></span> 02 Comments</p>-->
<!--                </div>-->
<!--                <div class="col-lg-6 flex-row d-flex meta-right no-padding justify-content-end">-->
<!--                    <div class="user-meta">-->
<!--                        <h4 class="text-white">Mark wiens</h4>-->
<!--                        <p>12 Dec, 2017 11:21 am</p>-->
<!--                    </div>-->
<!--                    <img class="img-fluid user-img" src="../img/user.jpg" alt="">-->
<!--                </div>-->
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->


<!-- Start category Area -->
<section class="category-area section-gap" id="news">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Latest News from all categories</h1>
                    <p>Keeping you posted with all the latest news from all leagues and categories</p>
                </div>
            </div>
        </div>
        <div class="active-cat-carusel">
            <?php
            foreach ($recentPostsOutput['data'] as $row){
                $convertDate = strtotime($row['post_date']);
                $day = date('j',$convertDate);
                $month = date('M',$convertDate);
                $year = date('Y',$convertDate);
                ?>
                <div class="item single-cat">
<!--                    <img src="../img/c1.jpg" alt="">-->
                    <img width="360" height="220" style="object-fit: cover" src="<?=$row['image_url']?>" alt="">
                    <p class="date"><?=$day.' '.$month.' '.$year?></p>
                    <h4><a href="#"><?=$row['post_title']?></a></h4>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- End category Area -->

<!-- Start travel Area -->
<section class="travel-area section-gap" id="travel">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Hot topics in the world of football</h1>
                    <p>Here are the highly discussed matters in football and the most sought after news</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 travel-left">
                <?php
                $i = 0;
                while($i < 2){
                    if (array_key_exists($i,$rowTrend)){
                        $convertDate = strtotime($rowTrend[$i]['post_date']);
                        $day = date('j',$convertDate);
                        $month = date('M',$convertDate);
                        ?>
                        <div class="single-travel media pb-70">
<!--                            <img class="img-fluid d-flex  mr-3" src="../img/t1.jpg" alt="">-->

                            <img width="195" height="180" style="object-fit: cover" class="img-fluid d-flex  mr-3" src="<?=$rowTrend[$i]['image_url']?>" alt="">
                            <div class="dates">
                                <span><?=$day?></span>
                                <p><?=$month?></p>
                            </div>
                            <div class="media-body align-self-center">
                                <h4 class="mt-0"><a href="#"><?=$rowTrend[$i]['post_title']?></a></h4>
                                <div class="sidebar-box">
                                    <p>
                                        <?=$rowTrend[$i]['post_content']?>
                                    </p>
                                </div>
                                <div class="meta-bottom d-flex justify-content-between">
                                    <p><span class="lnr lnr-heart"></span> 15 Likes</p>
                                    <p><span class="lnr lnr-bubble"></span> 02 Comments</p>
                                </div>
                                <div class="meta-bottom d-flex justify-content-between">
                                </div>

                            </div>
                        </div>
                        <?php
                    }
                    $i++;
                }
                ?>
            </div>
            <div class="col-lg-6 travel-right">
                <?php
                $i = 2;
                while($i < 4){
                    if (array_key_exists($i,$rowTrend)){
                        $convertDate = strtotime($rowTrend[$i]['post_date']);
                        $day = date('j',$convertDate);
                        $month = date('M',$convertDate);
                        ?>
                        <div class="single-travel media pb-70">
<!--                            <img class="img-fluid d-flex  mr-3" src="../img/t1.jpg" alt="">-->
                            <img width="195" height="180" class="img-fluid d-flex  mr-3" src="<?=$rowTrend[$i]['image_url']?>" alt="">
                            <div class="dates">
                                <span><?=$day?></span>
                                <p><?=$month?></p>
                            </div>
                            <div class="media-body align-self-center">
                                <h4 class="mt-0"><a href="#"><?=$rowTrend[$i]['post_title']?></a></h4>
                                <div class="sidebar-box">
                                    <p>
                                        <?=$rowTrend[$i]['post_content']?>
                                    </p>
                                </div>
                                <div class="meta-bottom d-flex justify-content-between">
                                    <p><span class="lnr lnr-heart"></span> 15 Likes</p>
                                    <p><span class="lnr lnr-bubble"></span> 02 Comments</p>
                                </div>
                                <div class="meta-bottom d-flex justify-content-between">
                                </div>

                            </div>
                        </div>
                        <?php
                    }
                    $i++;
                }
                ?>
            </div>
            <a href="news.php" class="primary-btn load-more pbtn-2 text-uppercase mx-auto mt-60">Load More </a>
        </div>
    </div>
</section>
<!-- End travel Area -->



<!-- start footer Area -->
<footer class="footer-area section-gap">
    <div class="container">
        <!--					<div class="row">-->
        <!--						<div class="col-lg-3  col-md-12">-->
        <!--							<div class="single-footer-widget">-->
        <!--								<h6>Top Products</h6>-->
        <!--								<ul class="footer-nav">-->
        <!--									<li><a href="#">Managed Website</a></li>-->
        <!--									<li><a href="#">Manage Reputation</a></li>-->
        <!--									<li><a href="#">Power Tools</a></li>-->
        <!--									<li><a href="#">Marketing Service</a></li>-->
        <!--								</ul>-->
        <!--							</div>-->
        <!--						</div>-->
        <!--						<div class="col-lg-6  col-md-12">-->
        <!--							<div class="single-footer-widget newsletter">-->
        <!--								<h6>Newsletter</h6>-->
        <!--								<p>You can trust us. we only send promo offers, not a single spam.</p>-->
        <!--								<div id="mc_embed_signup">-->
        <!--									<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">-->

        <!--										<div class="form-group row" style="width: 100%">-->
        <!--											<div class="col-lg-8 col-md-12">-->
        <!--												<input name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">-->
        <!--												<div style="position: absolute; left: -5000px;">-->
        <!--													<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">-->
        <!--												</div>-->
        <!--											</div> -->
        <!--										-->
        <!--											<div class="col-lg-4 col-md-12">-->
        <!--												<button class="nw-btn primary-btn">Subscribe<span class="lnr lnr-arrow-right"></span></button>-->
        <!--											</div> -->
        <!--										</div>		-->
        <!--										<div class="info"></div>-->
        <!--									</form>-->
        <!--								</div>		-->
        <!--							</div>-->
        <!--						</div>-->
        <!--						<div class="col-lg-3  col-md-12">-->
        <!--							<div class="single-footer-widget mail-chimp">-->
        <!--								<h6 class="mb-20">Instragram Feed</h6>-->
        <!--								<ul class="instafeed d-flex flex-wrap">-->
        <!--									<li><img src="img/i1.jpg" alt=""></li>-->
        <!--									<li><img src="img/i2.jpg" alt=""></li>-->
        <!--									<li><img src="img/i3.jpg" alt=""></li>-->
        <!--									<li><img src="img/i4.jpg" alt=""></li>-->
        <!--									<li><img src="img/i5.jpg" alt=""></li>-->
        <!--									<li><img src="img/i6.jpg" alt=""></li>-->
        <!--									<li><img src="img/i7.jpg" alt=""></li>-->
        <!--									<li><img src="img/i8.jpg" alt=""></li>-->
        <!--								</ul>-->
        <!--							</div>-->
        <!--						</div>						-->
        <!--					</div>-->

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