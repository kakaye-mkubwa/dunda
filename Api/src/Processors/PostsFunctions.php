<?php
namespace FootballBlog\Processors;

use FootballBlog\Models\DataHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use FootballBlog\Utils\DBConnect;

/**
 * Class PostsFunctions
 * @package Processors
 */
class PostsFunctions{

    /**
     * @var DataHandler
     */
    private $dataHandle;
    /**
     * @var Logger
     */
    private $log;

    /**
     * PostsFunctions constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->dataHandle = new DataHandler();

        $this->log = new Logger("Posts Functions");
        $errorStreamHandler = new StreamHandler("../../runtime/logs/error.log",Logger::ERROR);
        $infoStreamHandler = new StreamHandler("../../runtime/logs/info.log",Logger::INFO);
        $debugStreamHandler = new StreamHandler("../../runtime/logs/debug.log",Logger::DEBUG);

        $this->log->pushHandler($errorStreamHandler);
        $this->log->pushHandler($infoStreamHandler);
        $this->log->pushHandler($debugStreamHandler);
    }

    /**
     *
     */
    public function fetchAllPublishedPosts(){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $query = "SELECT b.postID, b.postTitle,b.postDescription,b.postContent,b.postDate,b.authorID,b.postImage,cat.categoryName FROM blog_posts b INNER JOIN categories cat ON b.categoryID = cat.categoryID WHERE b.isPublished = 1 ORDER BY b.postDate DESC";

        if ($stmt = mysqli_prepare($conn,$query)){
            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$fetchedPostID,$fetchedPostTitle,$fetchedPostDesc,$fetchedPostContent,$fetchedPostDate,$fetchedAuthorID,$fetchedPostImage,$fetchedCategoryName);
                while(mysqli_stmt_fetch($stmt)){
                    $imageURL = "https://dundafootball.com".substr($fetchedPostImage,26);
                    // $imageURL = "..".substr($fetchedPostImage,51);
                    $data[] = array("post_id"=>$fetchedPostID,"post_title"=>$fetchedPostTitle,"post_desc"=>$fetchedPostDesc,"post_content"=>$fetchedPostContent,"post_date"=>$fetchedPostDate,"author_id"=>$fetchedAuthorID,"category"=>$fetchedCategoryName,"image_url"=>$imageURL);
                }
                $output = array("error"=>"false","data"=>$data);
            }else{
                $this->log->error("Failed fetching published posts ".mysqli_stmt_error($stmt).' '.mysqli_error($conn));
                $output=array("error"=>"true","message"=>"Something went wrong");
            }
            mysqli_stmt_close($stmt);
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output=array("error"=>"true","message"=>"Something went wrong");
        }
        mysqli_close($conn);
        return json_encode($output,JSON_UNESCAPED_SLASHES);
    }


    public function fetchAllPublishedPostsMain(){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $query = "SELECT b.postID, b.postTitle,b.postDescription,b.postContent,b.postDate,b.authorID,b.postImage,cat.categoryName FROM blog_posts b INNER JOIN categories cat ON b.categoryID = cat.categoryID WHERE b.isPublished = 1 ORDER BY b.postDate DESC";

        if ($stmt = mysqli_prepare($conn,$query)){
            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$fetchedPostID,$fetchedPostTitle,$fetchedPostDesc,$fetchedPostContent,$fetchedPostDate,$fetchedAuthorID,$fetchedPostImage,$fetchedCategoryName);
                while(mysqli_stmt_fetch($stmt)){
                    $imageURL = "https://dundafootball.com".substr($fetchedPostImage,26);
                    // $imageURL = substr($fetchedPostImage,52);
                    $data[] = array("post_id"=>$fetchedPostID,"post_title"=>$fetchedPostTitle,"post_desc"=>$fetchedPostDesc,"post_content"=>$fetchedPostContent,"post_date"=>$fetchedPostDate,"author_id"=>$fetchedAuthorID,"category"=>$fetchedCategoryName,"image_url"=>$imageURL);
                }
                $output = array("error"=>"false","data"=>$data);
            }else{
                $this->log->error("Failed fetching published posts ".mysqli_stmt_error($stmt).' '.mysqli_error($conn));
                $output=array("error"=>"true","message"=>"Something went wrong");
            }
            mysqli_stmt_close($stmt);
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output=array("error"=>"true","message"=>"Something went wrong");
        }
        mysqli_close($conn);
        return json_encode($output,JSON_UNESCAPED_SLASHES);
    }

    /**
     * @return false|string
     */
    public function fetchRecentPublishedPosts(){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $query = "SELECT b.postID, b.postTitle,b.postDescription,b.postContent,b.postDate,b.authorID,b.postImage,cat.categoryName FROM blog_posts b INNER JOIN categories cat ON b.categoryID = cat.categoryID WHERE b.isPublished = 1 ORDER BY b.postDate DESC LIMIT 3";

        if ($stmt = mysqli_prepare($conn,$query)){
            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$fetchedPostID,$fetchedPostTitle,$fetchedPostDesc,$fetchedPostContent,$fetchedPostDate,$fetchedAuthorID,$fetchedPostImage,$fetchedCategoryName);
                while(mysqli_stmt_fetch($stmt)){
                    $imageURL = "https://dundafootball.com".substr($fetchedPostImage,26);
                    // $imageURL = "../".substr($fetchedPostImage,51);
                    $data[] = array("post_id"=>$fetchedPostID,"post_title"=>$fetchedPostTitle,"post_desc"=>$fetchedPostDesc,"post_content"=>$fetchedPostContent,"post_date"=>$fetchedPostDate,"author_id"=>$fetchedAuthorID,"category"=>$fetchedCategoryName,"image_url"=>$imageURL);
                }
                $output = array("error"=>"false","data"=>$data);
            }else{
                $this->log->error("Failed fetching published posts ".mysqli_stmt_error($stmt).' '.mysqli_error($conn));
                $output=array("error"=>"true","message"=>"Something went wrong");
            }
            mysqli_stmt_close($stmt);
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output=array("error"=>"true","message"=>"Something went wrong");
        }
        mysqli_close($conn);
        return json_encode($output,JSON_UNESCAPED_SLASHES);
    }

    public function fetchRecentPublishedPostsMain(){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $query = "SELECT b.postID, b.postTitle,b.postDescription,b.postContent,b.postDate,b.authorID,b.postImage,cat.categoryName FROM blog_posts b INNER JOIN categories cat ON b.categoryID = cat.categoryID WHERE b.isPublished = 1 ORDER BY b.postDate DESC LIMIT 3";

        if ($stmt = mysqli_prepare($conn,$query)){
            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$fetchedPostID,$fetchedPostTitle,$fetchedPostDesc,$fetchedPostContent,$fetchedPostDate,$fetchedAuthorID,$fetchedPostImage,$fetchedCategoryName);
                while(mysqli_stmt_fetch($stmt)){
                    $imageURL = "https://dundafootball.com".substr($fetchedPostImage,26);
                    // $imageURL = substr($fetchedPostImage,52);
                    $data[] = array("post_id"=>$fetchedPostID,"post_title"=>$fetchedPostTitle,"post_desc"=>$fetchedPostDesc,"post_content"=>$fetchedPostContent,"post_date"=>$fetchedPostDate,"author_id"=>$fetchedAuthorID,"category"=>$fetchedCategoryName,"image_url"=>$imageURL);
                }
                $output = array("error"=>"false","data"=>$data);
            }else{
                $this->log->error("Failed fetching published posts ".mysqli_stmt_error($stmt).' '.mysqli_error($conn));
                $output=array("error"=>"true","message"=>"Something went wrong");
            }
            mysqli_stmt_close($stmt);
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output=array("error"=>"true","message"=>"Something went wrong");
        }
        mysqli_close($conn);
        return json_encode($output,JSON_UNESCAPED_SLASHES);
    }
    
    /**
     *
     */
    public function fetchUnpublishedPosts(){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $query = "SELECT b.postID, b.postTitle,b.postDescription,b.postContent,b.postDate,b.authorID,b.postImage,cat.categoryName FROM blog_posts b INNER JOIN categories cat ON b.categoryID = cat.categoryID WHERE b.isPublished = 0 ORDER BY b.postDate DESC";

        if ($stmt = mysqli_prepare($conn,$query)){
            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$fetchedPostID,$fetchedPostTitle,$fetchedPostDesc,$fetchedPostContent,$fetchedPostDate,$fetchedAuthorID,$fetchedPostImage,$fetchedCategoryName);
                while(mysqli_stmt_fetch($stmt)){
                    $imageURL = "https://dundafootball.com".substr($fetchedPostImage,26);
                    // $imageURL = "../".substr($fetchedPostImage,51);
                    $data[] = array("post_id"=>$fetchedPostID,"post_title"=>$fetchedPostTitle,"post_desc"=>$fetchedPostDesc,"post_content"=>$fetchedPostContent,"post_date"=>$fetchedPostDate,"author_id"=>$fetchedAuthorID,"category"=>$fetchedCategoryName,"image_url"=>$imageURL);
                }
                $output = array("error"=>"false","data"=>$data);
            }else{
                $this->log->error("Failed fetching published posts ".mysqli_stmt_error($stmt).' '.mysqli_error($conn));
                $output=array("error"=>"true","message"=>"Something went wrong");
            }
            mysqli_stmt_close($stmt);
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output=array("error"=>"true","message"=>"Something went wrong");
        }
        mysqli_close($conn);
        return json_encode($output,JSON_UNESCAPED_SLASHES);
    }

    /**
     * @return false|string
     */
    public function fetchAllPosts(){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $query = "SELECT b.postID, b.postTitle,b.postDescription,b.postContent,b.postDate,b.authorID,b.postImage,cat.categoryName FROM blog_posts b INNER JOIN categories cat ON b.categoryID = cat.categoryID ORDER BY b.postDate DESC";

        if ($stmt = mysqli_prepare($conn,$query)){
            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$fetchedPostID,$fetchedPostTitle,$fetchedPostDesc,$fetchedPostContent,$fetchedPostDate,$fetchedAuthorID,$fetchedPostImage,$fetchedCategoryName);
                while(mysqli_stmt_fetch($stmt)){
                    $imageURL = "https://dundafootball.com".substr($fetchedPostImage,26);
                    // $imageURL = "../".substr($fetchedPostImage,51);
                    $data[] = array("post_id"=>$fetchedPostID,"post_title"=>$fetchedPostTitle,"post_desc"=>$fetchedPostDesc,"post_content"=>$fetchedPostContent,"post_date"=>$fetchedPostDate,"author_id"=>$fetchedAuthorID,"category"=>$fetchedCategoryName,"image_url"=>$imageURL);
                }
                $output = array("error"=>"false","data"=>$data);
            }else{
                $this->log->error("Failed fetching published posts ".mysqli_stmt_error($stmt).' '.mysqli_error($conn));
                $output=array("error"=>"true","message"=>"Something went wrong");
            }
            mysqli_stmt_close($stmt);
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output=array("error"=>"true","message"=>"Something went wrong");
        }
        mysqli_close($conn);
        return json_encode($output,JSON_UNESCAPED_SLASHES);
    }

    /**
     * @param $postID
     * @return false|string
     */
    public function setTrendingPosts($postID){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $postID = $this->dataHandle->sanitizeData($postID);

        $query = "UPDATE blog_posts SET isTrending = 1 WHERE postID = ?";

        if ($stmt = mysqli_prepare($conn,$query)){
            mysqli_stmt_bind_param($stmt,'i',$paramPostID);
            $paramPostID = $postID;

            if (mysqli_stmt_execute($stmt)){
                $this->log->info("Post $postID set as trending");
                $output = array("error"=>"false","message"=>"Set as trending");
            }else{
                $this->log->error("Failed setting post trend ".mysqli_error($conn).' '.mysqli_stmt_error($stmt));
                $output = array("error"=>"true","message"=>"ailed setting as trending");
            }
            mysqli_stmt_close($stmt);
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output = array("error"=>"true","message"=>"ailed setting as trending");
        }
        mysqli_close($conn);
        return json_encode($output,JSON_UNESCAPED_SLASHES);
    }

    /**
     * @param $postID
     * @return false|string
     */
    public function untrendPosts($postID){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $postID = $this->dataHandle->sanitizeData($postID);

        $query = "UPDATE blog_posts SET isTrending = 0 WHERE postID = ?";

        if ($stmt = mysqli_prepare($conn,$query)){
            mysqli_stmt_bind_param($stmt,'i',$paramPostID);
            $paramPostID = $postID;

            if (mysqli_stmt_execute($stmt)){
                $this->log->info("Post $postID set as trending");
                $output = array("error"=>"false","message"=>"Set as trending");
            }else{
                $this->log->error("Failed setting post trend ".mysqli_error($conn).' '.mysqli_stmt_error($stmt));
                $output = array("error"=>"true","message"=>"ailed setting as trending");
            }
            mysqli_stmt_close($stmt);
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output = array("error"=>"true","message"=>"ailed setting as trending");
        }
        mysqli_close($conn);
        return json_encode($output,JSON_UNESCAPED_SLASHES);
    }

    /**
     *
     */
    public function fetchTrendingPosts(){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $query = "SELECT b.postID, b.postTitle,b.postDescription,b.postContent,b.postDate,b.authorID,b.postImage,cat.categoryName FROM blog_posts b INNER JOIN categories cat ON b.categoryID = cat.categoryID WHERE b.isTrending = 1 ORDER BY b.postDate DESC";

        if ($stmt = mysqli_prepare($conn,$query)){
            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$fetchedPostID,$fetchedPostTitle,$fetchedPostDesc,$fetchedPostContent,$fetchedPostDate,$fetchedAuthorID,$fetchedPostImage,$fetchedCategoryName);
                while(mysqli_stmt_fetch($stmt)){
                    $imageURL = "https://dundafootball.com".substr($fetchedPostImage,26);
                    // $imageURL = "..".substr($fetchedPostImage,51);
                    $data[] = array("post_id"=>$fetchedPostID,"post_title"=>$fetchedPostTitle,"post_desc"=>$fetchedPostDesc,"post_content"=>$fetchedPostContent,"post_date"=>$fetchedPostDate,"author_id"=>$fetchedAuthorID,"category"=>$fetchedCategoryName,"image_url"=>$imageURL);
                }
                $output = array("error"=>"false","data"=>$data);
            }else{
                $this->log->error("Failed fetching published posts ".mysqli_stmt_error($stmt).' '.mysqli_error($conn));
                $output=array("error"=>"true","message"=>"Something went wrong");
            }
            mysqli_stmt_close($stmt);
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output=array("error"=>"true","message"=>"Something went wrong");
        }
        mysqli_close($conn);
        return json_encode($output,JSON_UNESCAPED_SLASHES);
    }

    public function fetchTrendingPostsMain(){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $query = "SELECT b.postID, b.postTitle,b.postDescription,b.postContent,b.postDate,b.authorID,b.postImage,cat.categoryName FROM blog_posts b INNER JOIN categories cat ON b.categoryID = cat.categoryID WHERE b.isTrending = 1 ORDER BY b.postDate DESC";

        if ($stmt = mysqli_prepare($conn,$query)){
            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$fetchedPostID,$fetchedPostTitle,$fetchedPostDesc,$fetchedPostContent,$fetchedPostDate,$fetchedAuthorID,$fetchedPostImage,$fetchedCategoryName);
                while(mysqli_stmt_fetch($stmt)){
                    $imageURL = "https://dundafootball.com".substr($fetchedPostImage,26);
                    // $imageURL = substr($fetchedPostImage,52);
                    $data[] = array("post_id"=>$fetchedPostID,"post_title"=>$fetchedPostTitle,"post_desc"=>$fetchedPostDesc,"post_content"=>$fetchedPostContent,"post_date"=>$fetchedPostDate,"author_id"=>$fetchedAuthorID,"category"=>$fetchedCategoryName,"image_url"=>$imageURL);
                }
                $output = array("error"=>"false","data"=>$data);
            }else{
                $this->log->error("Failed fetching published posts ".mysqli_stmt_error($stmt).' '.mysqli_error($conn));
                $output=array("error"=>"true","message"=>"Something went wrong");
            }
            mysqli_stmt_close($stmt);
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output=array("error"=>"true","message"=>"Something went wrong");
        }
        mysqli_close($conn);
        return json_encode($output,JSON_UNESCAPED_SLASHES);
    }


    /**
     * @return false|string
     */
    public function fetchCategories(){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $query = "SELECT categoryID, categoryName FROM categories";

        if ($stmt = mysqli_prepare($conn,$query)){
            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                mysqli_stmt_bind_result($stmt,$categoryID,$categoryName);
                $count = mysqli_stmt_num_rows($stmt);
                while(mysqli_stmt_fetch($stmt)){
                    $data[]=array("id"=>$categoryID,"category_name"=>$categoryName);
                }
                $output=array("error"=>"false","data"=>$data,"count"=>$count);
            }else{
                $this->log->error("Failed fetching categories ".mysqli_stmt_error($stmt).' '.mysqli_error($conn));
                $output=array("error"=>"true","message"=>"Something went wrong");
            }
            mysqli_stmt_close($stmt);
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output=array("error"=>"true","message"=>"Something went wrong");
        }
        mysqli_close($conn);
        return json_encode($output,JSON_UNESCAPED_SLASHES);
    }

    public function fetchPostsByCategory($categoryID){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $categoryID = $this->dataHandle->sanitizeData($categoryID);

        $query = "SELECT b.postID, b.postTitle,b.postDescription,b.postContent,b.postDate,b.authorID,b.postImage,cat.categoryName FROM blog_posts b INNER JOIN categories cat ON b.categoryID = cat.categoryID WHERE b.categoryID = ? ORDER BY b.postDate DESC";

        if ($stmt = mysqli_prepare($conn,$query)){
            mysqli_stmt_bind_param($stmt,'i',$paramCategoryID);
            $paramCategoryID = $categoryID;

            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$fetchedPostID,$fetchedPostTitle,$fetchedPostDesc,$fetchedPostContent,$fetchedPostDate,$fetchedAuthorID,$fetchedPostImage,$fetchedCategoryName);
                while(mysqli_stmt_fetch($stmt)){
                    $imageURL = "https://dundafootball.com".substr($fetchedPostImage,26);
                    // $imageURL = "../".substr($fetchedPostImage,52);
                    $data[] = array("post_id"=>$fetchedPostID,"post_title"=>$fetchedPostTitle,"post_desc"=>$fetchedPostDesc,"post_content"=>$fetchedPostContent,"post_date"=>$fetchedPostDate,"author_id"=>$fetchedAuthorID,"category"=>$fetchedCategoryName,"image_url"=>$imageURL);
                }
                $output = array("error"=>"false","data"=>$data);
            }else{
                $this->log->error("Failed fetching published posts ".mysqli_stmt_error($stmt).' '.mysqli_error($conn));
                $output=array("error"=>"true","message"=>"Something went wrong");
            }
            mysqli_stmt_close($stmt);
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output=array("error"=>"true","message"=>"Something went wrong");
        }
        mysqli_close($conn);
        return json_encode($output,JSON_UNESCAPED_SLASHES);
    }

    public function fetchPostsByCategoryMain($categoryID){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $categoryID = $this->dataHandle->sanitizeData($categoryID);

        $query = "SELECT b.postID, b.postTitle,b.postDescription,b.postContent,b.postDate,b.authorID,b.postImage,cat.categoryName FROM blog_posts b INNER JOIN categories cat ON b.categoryID = cat.categoryID WHERE b.categoryID = ? ORDER BY b.postDate DESC";

        if ($stmt = mysqli_prepare($conn,$query)){
            mysqli_stmt_bind_param($stmt,'i',$paramCategoryID);
            $paramCategoryID = $categoryID;

            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$fetchedPostID,$fetchedPostTitle,$fetchedPostDesc,$fetchedPostContent,$fetchedPostDate,$fetchedAuthorID,$fetchedPostImage,$fetchedCategoryName);
                while(mysqli_stmt_fetch($stmt)){
                    $imageURL = "https://dundafootball.com".substr($fetchedPostImage,26);
                    // $imageURL = substr($fetchedPostImage,52);
                    $data[] = array("post_id"=>$fetchedPostID,"post_title"=>$fetchedPostTitle,"post_desc"=>$fetchedPostDesc,"post_content"=>$fetchedPostContent,"post_date"=>$fetchedPostDate,"author_id"=>$fetchedAuthorID,"category"=>$fetchedCategoryName,"image_url"=>$imageURL);
                }
                $output = array("error"=>"false","data"=>$data);
            }else{
                $this->log->error("Failed fetching published posts ".mysqli_stmt_error($stmt).' '.mysqli_error($conn));
                $output=array("error"=>"true","message"=>"Something went wrong");
            }
            mysqli_stmt_close($stmt);
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output=array("error"=>"true","message"=>"Something went wrong");
        }
        mysqli_close($conn);
        return json_encode($output,JSON_UNESCAPED_SLASHES);
    }

    public function countPostsPerCategory($categoryID){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $query = "SELECT COUNT(*) FROM blog_posts WHERE categoryID = ?";

        if ($stmt = mysqli_prepare($conn,$query)){
            mysqli_stmt_bind_param($stmt,'i',$paramCategoryID);
            $paramCategoryID = $categoryID;

            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                mysqli_stmt_bind_result($stmt,$count);
                while(mysqli_stmt_fetch($stmt)){
                    $mCount = $count;
                }
                $output = array("error"=>"false","message"=>"$mCount");
            }else{
                $this->log->error("Failed counting all posts ".mysqli_stmt_error($stmt).' '.mysqli_error($conn));
                $output=array("error"=>"true","message"=>"Failed counting posts");
            }
            mysqli_stmt_close($stmt);
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output=array("error"=>"true","message"=>"Failed counting posts");
        }
        mysqli_close($conn);
        return json_encode($output,JSON_UNESCAPED_SLASHES);
    }

    /**
     * @param $year
     */
    public function countPostsPerMonth($year){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $year = $this->dataHandle->sanitizeData($year);

        $query = "SELECT COUNT(*) AS postCount,MONTHNAME(postDate) AS monthPosted FROM blog_posts WHERE YEAR(postDate) = ? GROUP BY MONTH(postDate)";

        if ($stmt = mysqli_prepare($conn,$query)){
            mysqli_stmt_bind_param($stmt,'i',$paramYear);
            $paramYear = $year;

            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$fetchedPostCount,$fetchedMonthPosted);
                while(mysqli_stmt_fetch($stmt)){
                    $output[] = array("month"=>$fetchedMonthPosted,"count"=>$fetchedMonthPosted);
                }
            }else{
                $this->log->error("Failed counting posts ".mysqli_stmt_error($stmt).' '.mysqli_error($conn));
                $output[] = array("error"=>"true","message"=>"Ooops! Something went wrong");
            }
            mysqli_stmt_close($stmt);
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output[] = array("error"=>"true","message"=>"Ooops! Something went wrong");
        }
        mysqli_close($conn);
        json_encode($output,JSON_UNESCAPED_SLASHES);
    }

    /**
     * @param $postID
     * @param $firstName
     * @param $secondName
     * @param $commentMessage
     * @return false|string
     */
    public function addComment($postID, $firstName, $secondName, $commentMessage){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $postID = $this->dataHandle->sanitizeData($postID);
        $firstName = $this->dataHandle->sanitizeData($firstName);
        $lastName = $this->dataHandle->sanitizeData($secondName);
        $commentMessage = $this->dataHandle->sanitizeData($commentMessage);

        $query="INSERT INTO blog_comments (postID,commentFirstName,commentSecondName,commentMessage) VALUES (?,?,?,?)";

        if ($stmt = mysqli_prepare($conn,$query)){
            mysqli_stmt_bind_param($stmt,'isss',$paramPostID,$paramCommentFirstName,$paramCommentSecondNane,$paramCommentMessage);
            $paramPostID = $postID;
            $paramCommentFirstName = $firstName;
            $paramCommentSecondNane = $secondName;
            $paramCommentMessage = $commentMessage;

            if (mysqli_stmt_execute($stmt)){
                $this->log->info("Comment added by $firstName for $postID");
                $output=array("error"=>"false","message"=>"success");
            }else{
                $this->log->error("Failed adding comment ".mysqli_stmt_error($stmt).' '.mysqli_error($conn));
                $output = array("error"=>"true","message"=>"Failed adding comment");
            }
            mysqli_stmt_close($stmt);
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output = array("error"=>"true","message"=>"Failed adding comment");
        }
        mysqli_close($conn);
        return json_encode($output,JSON_UNESCAPED_SLASHES);
    }

    /**
     * @param $categoryID
     * @return false|string
     */
    public function deleteCategory($categoryID){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $categoryID = $this->dataHandle->sanitizeData($categoryID);

        $query = "DELETE FROM categories WHERE categoryID = ?";

        if ($stmt = mysqli_prepare($conn,$query)){
            mysqli_stmt_bind_param($stmt,'i',$paramCategoryID);
            $paramCategoryID = $categoryID;

            if (mysqli_stmt_execute($stmt)){
                $this->log->info("$categoryID deleted");
                $output=array("error"=>"false","message"=>"deleted successfully");
            }else{
                $this->log->error("Failed deleting category $categoryID");
                $output=array("error"=>"true","message"=>"deleted failed");
            }
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output=array("error"=>"false","message"=>"deleted failed");
        }
        return json_encode($output,JSON_UNESCAPED_SLASHES);
    }

    /**
     * @return false|string
     */
    public function countAllPosts(){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $query = "SELECT COUNT(*) FROM blog_posts";

        if ($stmt = mysqli_prepare($conn,$query)){
            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                mysqli_stmt_bind_result($stmt,$count);
                while(mysqli_stmt_fetch($stmt)){
                    $mCount = $count;
                }
                $output = array("error"=>"false","message"=>"$mCount");
            }else{
                $this->log->error("Failed counting all posts ".mysqli_stmt_error($stmt).' '.mysqli_error($conn));
                $output=array("error"=>"true","message"=>"Failed counting posts");
            }
            mysqli_stmt_close($stmt);
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output=array("error"=>"true","message"=>"Failed counting posts");
        }
        mysqli_close($conn);
        return json_encode($output,JSON_UNESCAPED_SLASHES);
    }

    /**
     * @return false|string
     */
    public function countUnpublishedPosts(){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $query = "SELECT COUNT(*) FROM blog_posts WHERE isPublished = 0";

        if ($stmt = mysqli_prepare($conn,$query)){
            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                mysqli_stmt_bind_result($stmt,$count);
                while(mysqli_stmt_fetch($stmt)){
                    $mCount = $count;
                }
                $output = array("error"=>"false","message"=>"$mCount");
            }else{
                $this->log->error("Failed counting all posts ".mysqli_stmt_error($stmt).' '.mysqli_error($conn));
                $output=array("error"=>"true","message"=>"Failed counting posts");
            }
            mysqli_stmt_close($stmt);
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output=array("error"=>"true","message"=>"Failed counting posts");
        }
        mysqli_close($conn);
        return json_encode($output,JSON_UNESCAPED_SLASHES);
    }

    public function countPublishedPosts(){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $query = "SELECT COUNT(*) FROM blog_posts WHERE isPublished = 1";

        if ($stmt = mysqli_prepare($conn,$query)){
            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                mysqli_stmt_bind_result($stmt,$count);
                while(mysqli_stmt_fetch($stmt)){
                    $mCount = $count;
                }
                $output = array("error"=>"false","message"=>"$mCount");
            }else{
                $this->log->error("Failed counting all posts ".mysqli_stmt_error($stmt).' '.mysqli_error($conn));
                $output=array("error"=>"true","message"=>"Failed counting posts");
            }
            mysqli_stmt_close($stmt);
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output=array("error"=>"true","message"=>"Failed counting posts");
        }
        mysqli_close($conn);
        return json_encode($output,JSON_UNESCAPED_SLASHES);
    }

    /**
     * @param $postID
     * @return false|string
     */
    public function fetchPostDetails($postID){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $postID = $this->dataHandle->sanitizeData($postID);

        $query = "SELECT b.postID, b.postTitle,b.postDescription,b.postContent,b.postDate,b.authorID,b.postImage,cat.categoryName FROM blog_posts b INNER JOIN categories cat ON b.categoryID = cat.categoryID WHERE b.postID = ? ORDER BY b.postDate DESC";

        if ($stmt = mysqli_prepare($conn,$query)){
            mysqli_stmt_bind_param($stmt,'s',$paramPostID);
            $paramPostID = $postID;
            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$fetchedPostID,$fetchedPostTitle,$fetchedPostDesc,$fetchedPostContent,$fetchedPostDate,$fetchedAuthorID,$fetchedPostImage,$fetchedCategoryName);
                while(mysqli_stmt_fetch($stmt)){
                    $imageURL = "https://dundafootball.com".substr($fetchedPostImage,26);
                    // $imageURL = "../".substr($fetchedPostImage,51);
                    $data[] = array("post_id"=>$fetchedPostID,"post_title"=>$fetchedPostTitle,"post_desc"=>$fetchedPostDesc,"post_content"=>$fetchedPostContent,"post_date"=>$fetchedPostDate,"author_id"=>$fetchedAuthorID,"category"=>$fetchedCategoryName,"image_url"=>$imageURL);
                }
                $output = array("error"=>"false","data"=>$data);
            }else{
                $this->log->error("Failed fetching published posts ".mysqli_stmt_error($stmt).' '.mysqli_error($conn));
                $output=array("error"=>"true","message"=>"Something went wrong");
            }
            mysqli_stmt_close($stmt);
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output=array("error"=>"true","message"=>"Something went wrong");
        }
        mysqli_close($conn);
        return json_encode($output,JSON_UNESCAPED_SLASHES);
    }

    public function fetchPostDetailsMain($postID){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $postID = $this->dataHandle->sanitizeData($postID);

        $query = "SELECT b.postID, b.postTitle,b.postDescription,b.postContent,b.postDate,b.authorID,b.postImage,cat.categoryName FROM blog_posts b INNER JOIN categories cat ON b.categoryID = cat.categoryID WHERE b.postID = ? ORDER BY b.postDate DESC";

        if ($stmt = mysqli_prepare($conn,$query)){
            mysqli_stmt_bind_param($stmt,'s',$paramPostID);
            $paramPostID = $postID;
            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$fetchedPostID,$fetchedPostTitle,$fetchedPostDesc,$fetchedPostContent,$fetchedPostDate,$fetchedAuthorID,$fetchedPostImage,$fetchedCategoryName);
                while(mysqli_stmt_fetch($stmt)){
                    $imageURL = "https://dundafootball.com".substr($fetchedPostImage,26);
                    // $imageURL = substr($fetchedPostImage,52);
                    $data[] = array("post_id"=>$fetchedPostID,"post_title"=>$fetchedPostTitle,"post_desc"=>$fetchedPostDesc,"post_content"=>$fetchedPostContent,"post_date"=>$fetchedPostDate,"author_id"=>$fetchedAuthorID,"category"=>$fetchedCategoryName,"image_url"=>$imageURL);
                }
                $output = array("error"=>"false","data"=>$data);
            }else{
                $this->log->error("Failed fetching published posts ".mysqli_stmt_error($stmt).' '.mysqli_error($conn));
                $output=array("error"=>"true","message"=>"Something went wrong");
            }
            mysqli_stmt_close($stmt);
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output=array("error"=>"true","message"=>"Something went wrong");
        }
        mysqli_close($conn);
        return json_encode($output,JSON_UNESCAPED_SLASHES);
    }

    public function fetchPostsByTag($tag){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $tag = $this->dataHandle->sanitizeData(strtolower($tag));

        $query = "SELECT b.postID, b.postTitle,b.postDescription,b.postContent,b.postDate,b.authorID,b.postImage FROM blog_posts b INNER JOIN blog_tags t ON b.postID = t.postID WHERE t.tagName = ? AND b.isPublished = 1 ORDER BY b.postDate DESC";

        if ($stmt = mysqli_prepare($conn,$query)){
            mysqli_stmt_bind_param($stmt,'s',$paramTagName);
            $paramTagName = $tag;

            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$fetchedPostID,$fetchedPostTitle,$fetchedPostDesc,$fetchedPostContent,$fetchedPostDate,$fetchedAuthorID,$fetchedPostImage);
                while(mysqli_stmt_fetch($stmt)){
                    $imageURL = "https://dundafootball.com".substr($fetchedPostImage,26);
                    // $imageURL = substr($fetchedPostImage,52);
                    $data[] = array("post_id"=>$fetchedPostID,"post_title"=>$fetchedPostTitle,"post_desc"=>$fetchedPostDesc,"post_content"=>$fetchedPostContent,"post_date"=>$fetchedPostDate,"author_id"=>$fetchedAuthorID,"image_url"=>$imageURL);
                }
                $output = array("error"=>"false","data"=>$data);
            }else{
                $this->log->error("Failed fetching published $tag posts ".mysqli_stmt_error($stmt).' '.mysqli_error($conn));
                $output=array("error"=>"true","message"=>"Something went wrong");
            }
            mysqli_stmt_close($stmt);
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output=array("error"=>"true","message"=>"Something went wrong");
        }
        mysqli_close($conn);
        return json_encode($output,JSON_UNESCAPED_SLASHES);
    }
    public function fetchBlogTags($postID){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $postID = $this->dataHandle->sanitizeData(strtolower($postID));
        $query = "SELECT tagName FROM blog_tags WHERE postID = ?";

        if ($stmt = mysqli_prepare($conn,$query)){
            mysqli_stmt_bind_param($stmt,'i',$paramPostID);
            $paramPostID = $postID;

            if (mysqli_stmt_execute($stmt)){
                $output = mysqli_stmt_get_result($stmt);
                $numRows = $output->num_rows;
            }else{
                $this->log->error("Failed fetching tags for $postID ".mysqli_stmt_error($stmt).' '.mysqli_error($conn));
                $output=array("error"=>"true","message"=>"Something went wrong");
            }
            mysqli_stmt_close($stmt);
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output=array("error"=>"true","message"=>"Something went wrong");
        }
        mysqli_close($conn);
        return $output;
    }

    public function countTagPosts($tagName){
        $dbConnect = new DBConnect();
        $conn = $dbConnect->dbConnection();

        $tagName = $this->dataHandle->sanitizeData(strtolower($tagName));
        $query = "SELECT COUNT(*) AS numRows FROM blog_posts b INNER JOIN blog_tags t ON b.postID = t.postID WHERE t.tagName = ? AND b.isPublished = 1 ORDER BY b.postDate DESC";

        if ($stmt = mysqli_prepare($conn,$query)){
            mysqli_stmt_bind_param($stmt,'s',$paramTagName);
            $paramTagName = $tagName;

            if (mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
//                $numRows = $output->num_rows;
                foreach ($result as $row){
                    $numRows = $row['numRows'];
                }
                $output = array("error"=>"false","message"=>$numRows);
            }else{
                $this->log->error("Failed counting posts for $tagName".mysqli_stmt_error($stmt).' '.mysqli_error($conn));
                $output=array("error"=>"true","message"=>"Something went wrong");
            }
            mysqli_stmt_close($stmt);
        }else{
            $this->log->error("Prepare failed ".mysqli_error($conn));
            $output=array("error"=>"true","message"=>"Something went wrong");
        }
        mysqli_close($conn);
        return json_encode($output);
    }
}
