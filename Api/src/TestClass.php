<?php
namespace FootballBlog;

use FootballBlog\Processors\BloggersFunctions;
use FootballBlog\Processors\PostsFunctions;

class TestClass{

    private $bloggerFunctions;

    /**
     * TestClass constructor.
     */
    public function __construct()
    {

    }

    public function getBloggerID(){
        $this->bloggerFunctions = new BloggersFunctions();
        $member[] = json_decode($this->bloggerFunctions->getBloggerID("kellybrian@gmail.com"),true);
        return $member[0]['id'];
    }

    public function getPostCategories(){
        $postFunctions = new PostsFunctions();
        return $postFunctions->fetchCategories();
    }

    public function countAllPosts(){
        $postsFunctions = new PostsFunctions();
        $output= json_decode($postsFunctions->countAllPosts(),true);
        return $output["message"];
    }

    public function fetchTrendingPost(){
        $postsFunctions = new PostsFunctions();
        $output = json_decode($postsFunctions->fetchTrendingPosts(),true);
        return $output['data'];
    }

    public function fetchPublishedPosts(){
        $postsFunctions = new PostsFunctions();
        $postsOutput = json_decode($postsFunctions->fetchAllPublishedPosts(),true);
        return $postsOutput['data'];
    }

    public function fetchPostDetails(){
        $postsFunctions = new PostsFunctions();
        $output = json_decode($postsFunctions->fetchPostDetails(5),true);
        return $output['data'];
    }

    public function getBloggerDetails(){
        $bloggerFunctions = new BloggersFunctions();
        $output = json_decode($bloggerFunctions->fetchBloggerDetails(15),true);
        return $output["data"][0]["username"];
    }

}

include_once "../vendor/autoload.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$testClass = new TestClass();
//echo $testClass->getBloggerID();
//print_r($testClass->getBloggerID());
//var_dump($testClass->getPostCategories());
//echo $testClass->countAllPosts();

//var_dump($testClass->fetchTrendingPost());
//var_dump($testClass->fetchPublishedPosts());
//var_dump($testClass->fetchPostDetails());
//var_dump($testClass->getBloggerDetails());

var_dump($testClass->fetchTrendingPost());

