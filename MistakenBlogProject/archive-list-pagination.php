<?php 
require_once('php/connection.php');

$category_id=$_GET['id'];
require('php/pagination.php');
$pagination_id=$_GET['pagid'];
$sum=$count;
$count_posts=($pagination_id-1)*10;
$sum_recent_post=$sum-$count_posts;
if ($sum_recent_post >= 10) $sum_recent_post=10;

// $pagination_id=$_GET['pagid'];
// $sum=$count;
// $count_posts=($pagination_id-1)*10;
// $sum_recent_post=$sum-$count_posts;
// echo $sum_recent_post;

$query="SELECT p.*,c.title as category,a.name
 FROM posts p
LEFT JOIN categories c ON p.category_id=c.id
LEFT JOIN authors a ON p.author_id=a.id
WHERE category_id=$category_id
ORDER BY p.created_at DESC  limit $count_posts,$sum_recent_post";
$result=$conn->query($query);
$posts=array();
while($row=$result->fetch_assoc()){
    $posts[]=$row;
}
$category=$posts[0]['category'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?php echo $category."| MISTAKEN  BLOG" ?></title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon4.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Top Header Area -->
        

        <!-- Navbar Area -->
        <div class="vizew-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">

                    <!-- Menu -->
                    <?php require('php/nav.php'); ?>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="archive-list.php?id=<?=$id?>"><?=$category?></a></li>
                            
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Archive List Posts Area Start ##### -->
    <div class="vizew-archive-list-posts-area mb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <!-- Archive Catagory & View Options -->
                    <div class="archive-catagory-view mb-50 d-flex align-items-center justify-content-between">
                        <!-- Catagory -->
                        <div class="archive-catagory">
                            <h4><i class="" aria-hidden="true"></i> <?=mb_strtoupper($category,'UTF-8')?> </h4>
                        </div>
                        <!-- View Options -->
                        <div class="view-options">
                            <a href="archive-grid.php?id=<?=$category_id?>"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                            <a href="archive-list.php?id=<?=$category_id?>" class="active"><i class="fa fa-list-ul" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <!-- Single Post Area -->
                    <?php foreach($posts as $index){ ?>
                    <div class="single-post-area style-2">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="<?=$index['thumbnail']?>" alt="" style="height:200px; width:350px">

                                    <!-- Video Duration -->
                                    
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <!-- Post Content -->
                                <div class="post-content mt-0">
                                    <a href="#" class="post-cata cata-sm cata-success"><?=$category?></a>
                                    <a href="single-post.php?id=<?=$index['id']?>&category=<?=$index['category']?>" class="post-title mb-2"><?=$index['title']?></a>
                                    <div class="post-meta d-flex align-items-center mb-2">
                                        <a href="#" class="post-author" style="cursor:auto">Đăng bởi <?=$index['name']?></a>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <a href="" class="post-date" style="cursor:auto"><?=$index['created_at']?></a>
                                    </div>
                                    <p class="mb-2"><?=$index['description']?></p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                            <?php } ?>
                
                    

                    <!-- Pagination -->
                    <nav class="mt-50">
                        <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                           
                            <?php 
                            require('php/pagination.php');
                           
                     
                            $div=$count/10;
                           
                            $mod=$count%10;
                            
                            if($mod != 0) $div++;
                            
                            for($i=1;$i<=$div;$i++){
                            ?>
                            <?php if ($i == 1) {?>
                                 <li class="page-item"><a class="page-link" href="archive-list.php?id=<?=$category_id?>">1</a></li>
                            <?php } else { ?>
                                <li class="page-item"><a class="page-link" href="archive-list-pagination.php?id=<?=$category_id?>&pagid=<?=$i?>"><?=$i?></a></li>
                            <?php } ?>
                            <?php
                            }
                            
                            ?>
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </nav>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="sidebar-area">

                        <!-- ***** Single Widget ***** -->
                        
                        <!-- ***** Single Widget ***** -->
                        <?php 
                        $query_like_posts="SELECT p.*,c.title as category 
                        FROM posts  p
                        LEFT JOIN categories c ON p.category_id=c.id
                        WHERE maybeyoulike=1 ORDER BY created_at DESC limit 5";
                        $result_like_posts=$conn->query($query_like_posts);
                        $like_first_posts=$result_like_posts->fetch_assoc();
                        $like_posts=array();
                        while($row=$result_like_posts->fetch_assoc()){
                            $like_posts[]=$row;
                        }?>
                        <div class="single-widget latest-video-widget mb-50">
                            <!-- Section Heading -->
                            <div class="section-heading style-2 mb-30">
                                <h4>Có thể bạn sẽ thích</h4>
                                <div class="line"></div>
                            </div>

                           
                            <div class="single-post-area mb-30">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="<?=$like_first_posts['thumbnail']?>" alt="">

                                    <!-- Video Duration -->
                                    
                                </div>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="#" class="post-cata cata-sm cata-success"><?=$like_first_posts['category']?></a>
                                    <a href="single-post.php?id=<?=$like_first_posts['id']?>&category=<?=$like_first_posts['category']?>" class="post-title"><?=$like_first_posts['title']?></a>
                                    
                                </div>
                            </div>

                            <?php foreach ($like_posts as $index){ ?>
                            <div class="single-blog-post d-flex">
                                <div class="post-thumbnail">
                                    <img src="<?=$index['thumbnail']?>" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="single-post.php?id=<?=$index['id']?>&category=<?=$index['category']?>" class="post-title"><?=$index['title']?> </a>
                                   
                                </div>
                            </div>
                            <?php } ?>

                           
                        </div>

                        <!-- ***** Single Widget ***** -->
                       

                        <!-- ***** Sidebar Widget ***** -->
                        <div class="single-widget youtube-channel-widget mb-50">
                            <!-- Section Heading -->
                            <div class="section-heading style-2 mb-30">
                                <h4>Hot Channels</h4>
                                <div class="line"></div>
                            </div>

                          <?php 
                          
                          $query_youtube="SELECT * FROM hotchannels";
                          $result_youtube=$conn->query($query_youtube);
                          $hot_channels=array();
                          while($row=$result_youtube->fetch_assoc()){
                              $hot_channels[]=$row;
                          }
                          foreach ($hot_channels as $index){
                          ?>
                          
                            <div class="single-youtube-channel d-flex align-items-center">
                                <div class="youtube-channel-thumbnail">
                                    <img src="<?=$index['thumbnail']?>" alt="">
                                </div>
                                <div class="youtube-channel-content">
                                    <a href="#" class="channel-title" style="cursor:auto"><?=$index['name']?></a>
                                    <a href="<?=$index['link']?>" target="_blank" class="btn subscribe-btn"><i class="fa fa-play-circle-o" aria-hidden="true"></i> Subscribe</a>
                                </div>
                            </div>
                          <?php } ?>

                        <!-- ***** Single Widget ***** -->
                            

                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget">
                            <!-- Section Heading -->
                            <div class="section-heading style-2 mb-30">
                                <h4>1 số trang Web hữu ích<h4>
                                <div class="line"></div>
                            </div>

                            <?php
                            $query_website="SELECT * FROM website";
                            $result_website=$conn->query($query_website);
                            $website=array();
                            while($row=$result_website->fetch_assoc()){
                                $website[]=$row;
                            }
                            foreach ($website as $index){
                            ?>
                            <div class="single-blog-post d-flex">
                                <div class="post-thumbnail">
                                    <img src="<?=$index['thumbnail']?>" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="<?=$index['link']?>" class="post-title " target="_blank"><?=$index['name']?></a>
                                </div>
                            </div>
                            <?php } ?>

                         
                            <!-- Single Blog Post -->
                            

                            <!-- Single Blog Post -->
                          

                            <!-- Single Blog Post -->
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Archive List Posts Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php require('php/footer.php'); ?> 
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>