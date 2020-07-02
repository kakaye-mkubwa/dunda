<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include_once 'Api/vendor/autoload.php';

use FootballBlog\Processors\PostsFunctions;

if (isset($_GET["tag"]) && isset($_GET["page"])){
    $currentPage = $_GET["page"];
    $tag = $_GET["tag"];
}elseif (isset($_GET['tag'])){
    $currentPage = 0;
    $tag = $_GET["tag"];
}

$postsFunctions = new PostsFunctions();


//$postsOutput = json_decode($postsFunctions->fetchAllPublishedPostsMain(),true);
$postsOutput = json_decode($postsFunctions->fetchPostsByTag($tag),true);
$outputCategories = json_decode($postsFunctions->fetchCategories(),true);
$recentPostsOutput = json_decode($postsFunctions->fetchRecentPublishedPostsMain(),true);

//print_r($postsOutput);

$postsCount = json_decode($postsFunctions->countTagPosts($tag),true);
$limit = 10;
$totalPages = ceil($postsCount["message"]/$limit);

//if(isset($_GET["page"])){
//    $currentPage = $_GET["page"];
//}else{
//    $currentPage = 0;
//}

$startFrom = $currentPage * 10;
$endAt = $startFrom + 9;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-170196200-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-170196200-1');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?=$tag?> on Dunda Football">
    <meta name="author" content="">

    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title><?=$tag?> - Dunda Football</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<?php include_once 'navbar.php'?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <!--            <h1>Clean Blog</h1>-->
                    <!--            <span class="subheading">Everything Soccer</span>-->
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php
            $row = $postsOutput["data"];
            for ($i=$startFrom;$i<$endAt;$i++){
                if (array_key_exists($i,$row)){
                    $convertDate = strtotime($row[$i]['post_date']);
                    $day = date('j',$convertDate);
                    $month = date('M',$convertDate);
                    $year = date('y',$convertDate);


                    ?>
                    <div class="post-preview">
                        <a href="post.php?id=<?=$row[$i]['post_id']?>">
                            <h2 class="post-title">
                                <?=$row[$i]['post_title']?>
                            </h2>
                            <h3 class="post-subtitle">
                                <?=$row[$i]['post_desc']?>
                            </h3>
                        </a>
                        <p class="post-meta">Posted
                            on <?=$month.' '.$day.', '.$year?></p>
                    </div>
                    <hr>
                    <?php
                }
            }
            ?>


            <!-- Pager -->
            <div class="clearfix">
                <?php
                if(($currentPage+1) <$totalPages){
                    $nextPage = $currentPage+1;
                }else{
                    $nextPage = $currentPage;
                }
                if ($currentPage != 0){
                    ?>
                    <a class="btn btn-primary float-left" href="#">&larr; Newer Posts</a>
                    <?php
                }
                ?>
                <a class="btn btn-primary float-right" href="<?="tags.php?tag=$tag&page=".$nextPage?>">Older Posts &rarr;</a>
            </div>
        </div>
    </div>
</div>

<hr>

<!-- Footer -->
<?=include_once 'footer.php';?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/clean-blog.min.js"></script>

<script>
    document.getElementById("year").innerHTML = new Date().getFullYear();
</script>

</body>

</html>
