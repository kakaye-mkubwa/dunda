<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include_once '../Api/vendor/autoload.php';

use FootballBlog\Processors\EncryptHandler;
use FootballBlog\Processors\PostsFunctions;
use FootballBlog\Processors\SessionManager;
use FootballBlog\Processors\BloggersFunctions;



$request = htmlentities($_SERVER['REQUEST_URI']);

$postsFunctions = new PostsFunctions();
$bloggerFunctions = new BloggersFunctions();
$encryptFunctions = new EncryptHandler();

$outputCategories = json_decode($postsFunctions->fetchCategories(),true);
//$outputRecentPublishedPosts = json_decode($postsFunctions->fetchRecentPublishedPosts(),true);
$recentPostsOutput = json_decode($postsFunctions->fetchRecentPublishedPostsMain(),true);

$postID = $encryptFunctions->decrypt($_GET['id']);
if ($postID == "error"){
    http_response_code(404);
    die();
}
$postDetailsOutput = json_decode($postsFunctions->fetchPostDetailsMain($postID),true);
$tagsArray = $postsFunctions->fetchBlogTags($postID);

$rowDetails = $postDetailsOutput['data'][0];
$bloggerDetailsOutput = json_decode($bloggerFunctions->fetchBloggerDetailsMain($rowDetails['author_id']),true);
$bloggerDetails = $bloggerDetailsOutput['data'][0];

$convertDate = strtotime($rowDetails['post_date']);
$day = date('j',$convertDate);
$month = date('M',$convertDate);
$year = date('y',$convertDate);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?=$rowDetails['post_title']?>">
    <meta name="author" content="">

    <!--  FAVICON  -->
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <link rel="manifest" href="../favicon/site.webmanifest">
    <link rel="mask-icon" href="../favicon/safari-pinned-tab.svg" color="#5bbad5">

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title><?=$rowDetails['post_title']?> - Dunda Football</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>



    <!-- Custom styles for this template -->
    <link href="../css/clean-blog.min.css" rel="stylesheet">


</head>

<body>

<!-- Navigation -->
<?php include_once '../navbar.php';?>

<!-- Page Header -->
<span itemscope itemtype="http://schema.org/Article">
    <header class="masthead img-responsive" style="background-image: url('<?=$rowDetails['image_url']?>')"">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1 itemprop="name"><?=$rowDetails['post_title']?></h1>
            <h2 class="subheading"><?=$rowDetails['post_desc']?></h2>
            <span class="meta">Posted by <?=$bloggerDetails['username']?>
              on <?=$month.' '.$day.', '.$year?></span>
          </div>
        </div>
      </div>
    </div>
    </header>

    <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">

        <div class="col-lg-8 col-md-10 mx-auto">
            <p class="font-weight-bold text-right pr-3">Share this post on
            <a href="#" id="share-wa" class="sharer button" data-sharer="whatsapp" data-title="<?=$rowDetails['post_title']?>" data-url="https://dundafootball.com<?=$request?>" data-web="Share on Whatsapp Web"><i class="fa fa-3x fa-whatsapp" style="font-size: 1.5em;"></i></a>
            <a href="#" id="share-fb" class="sharer button" data-sharer="facebook" data-hashtag="dundafootball" data-url="https://dundafootball.com<?=$request?>"><i class="fa fa-3x fa-facebook-square" style="font-size: 1.5em;"></i></a>
            <a href="#" id="share-tw" class="sharer button" data-sharer="twitter" data-title="<?=$rowDetails['post_title']?>" data-hashtags="dundafootball" data-url="https://dundafootball.com<?=$request?>"><i class="fa fa-3x fa-twitter-square" style="font-size: 1.5em;"></i></a>
            <a href="#" id="share-li" class="sharer button" data-sharer="linkedin" data-url="https://dundafootball.com<?=$request?>"><i class="fa fa-3x fa-linkedin-square" style="font-size: 1.5em;"></i></a>
            <a href="#" id="share-em" class="sharer button" data-sharer="email" data-title="<?=$rowDetails['post_title']?>" data-url="https://dundafootball.com<?=$request?>" data-subject="Hey! Check out this!" ><i class="fa fa-3x fa-envelope-square" style="font-size: 1.5em;"></i></a>
            </p>

            <?php
            $numsRows = $tagsArray->num_rows;
            foreach ($tagsArray as $tag){
                $url = "tags.php?tag=".urlencode($tag['tagName']);
                ?>
                <a href="<?=$url?>" class="badge badge-pill badge-dark"><?=$tag['tagName']?></a>
                <?php
            }
            ?>

            <span itemprop="articleBody">
                <p><?=$rowDetails["post_content"]?></p>
            </span>
        </div>
      </div>
    </div>
  </article>
  </span>

<hr>

<!-- Footer -->
<?=include_once '../footer.php';?>

<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for this template -->
<script src="../js/clean-blog.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sharer.js@latest/sharer.min.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-170196200-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-170196200-1');
</script>

</body>

</html>
