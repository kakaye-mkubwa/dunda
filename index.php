<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include_once 'Api/vendor/autoload.php';

use FootballBlog\Processors\EncryptHandler;
use FootballBlog\Processors\PostsFunctions;


$postsFunctions = new PostsFunctions();
$encryptFunctions = new EncryptHandler();


$postsOutput = json_decode($postsFunctions->fetchAllPublishedPostsMain(),true);
$outputCategories = json_decode($postsFunctions->fetchCategories(),true);
$recentPostsOutput = json_decode($postsFunctions->fetchRecentPublishedPostsMain(),true);


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


    <!-- JSON-LD markup generated by Google Structured Data Markup Helper. -->
    <script type="application/ld+json">
        {
            "@context" : "http://schema.org",
            "@type" : "Website",
            "name" : "Dunda Football",
            "author" : {
                "@type" : "Person",
                "name" : "Dunda Football"
            }
        }
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Dunda Football. Keeping you informed and entertained with soccer content tailored just for you. Home to everything soccer, for the love of the game.">
    <meta name="keywords" content="Dunda, Dunda Football, Dunda Football, DundaFootball">
    <meta name="title" content="Dunda Football - Everything soccer">
    <meta name="author" content="Dunda Football">

    <!-- Facebook   -->
    <meta property="og:site_name" content="Dunda Football">
    <meta property="og:title" content="Dunda Football - Everything soccer" />
    <meta property="og:description" content="Dunda Football. Keeping you informed and entertained with soccer content tailored just for you. Home to everything soccer, for the love of the game." />
    <meta property="og:image" itemprop="image" content="img/home-bg.jpg">
    <meta property="og:image:width" content="150px">
    <meta property="og:image:height" content="150px">
    <meta property="og:type" content="website" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://dundafootball.com">
    <meta property="twitter:title" content="Dunda Football - Everything soccer">
    <meta property="twitter:description" content="Dunda Football. Keeping you informed and entertained with soccer content tailored just for you. Home to everything soccer, for the love of the game.">
    <meta property="twitter:image" content="img/home-bg.jpg">


    <meta name="google-site-verification" content="lR1pnI-4Uhce-I5nNr0NhVX_JACP5ZcJnue-WYSWe_w" />
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    <title>Home - Dunda Football</title>

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
<?php include_once 'navbar.php';?>

<!-- Page Header -->
<header>
    <div class="card card-inverse">
        <img class="img-fluid" src="img/home-bg.jpg" alt="Card image" style="height: 75vh">
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
                        <a href="post.php?id=<?=$encryptFunctions->encrypt(strval($row[$i]['post_id']))?>">
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
                <a class="btn btn-primary float-right" href="<?="index.php?page=".$nextPage?>">Older Posts &rarr;</a>
            </div>
        </div>
    </div>
</div>

<hr>

<!-- Footer -->
<?php include_once 'footer.php';?>

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
