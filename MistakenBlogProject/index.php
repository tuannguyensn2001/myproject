<?php 
require_once('php/connection.php');
$query_latest_posts="SELECT p.*,c.title as category,a.name
FROM `posts` p
LEFT JOIN categories c ON p.category_id=c.id 
LEFT JOIN authors a ON p.author_id=a.id
ORDER BY p.created_at DESC limit 5";
$result1=$conn->query($query_latest_posts);
$lastest_post=$result1->fetch_assoc();
$lastest_4_posts=array();
while($row=$result1->fetch_assoc()){
    $lastest_4_posts[]=$row;
}


//
$query_favorite_posts="SELECT p.*,c.title as category,a.name
FROM `posts` p
LEFT JOIN categories c ON p.category_id=c.id 
LEFT JOIN authors a ON p.author_id=a.id
WHERE mainpost=1
ORDER BY p.created_at ASC limit 3";
$result2=$conn->query($query_favorite_posts);
$favorite_post=$result2->fetch_assoc();
$favorite_post2=$result2->fetch_assoc();
$favorite_post3=$result2->fetch_assoc();



//maybe youlike


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
    <title>MISTAKEN  BLOG</title>

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

                    <?php require('php/nav.php'); ?>
                    
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Trending Posts Area Start ##### -->
   
    <!-- ##### Trending Posts Area End ##### -->

    <!-- ##### Vizew Post Area Start ##### -->
    <hr>
    <section class="vizew-post-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="all-posts-area">
                        <!-- Section Heading -->
                        <div class="section-heading style-2">
                            <h4>BÀI VIẾT NỔI BẬT</h4>
                            <div class="line"></div>
                        </div>

                        <!-- Featured Post Slides -->
                        <div class="featured-post-slides owl-carousel mb-30">
                            <!-- Single Feature Post -->
                            

                            <!-- Single Feature Post -->
                            <div class="single-feature-post video-post bg-img" style="background-image: url(<?=$favorite_post['thumbnail']?>);">
                                <!-- Play Button -->
                               

                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="archive-list.php?id=<?=$favorite_post['category_id']?>" class="post-cata"><?=$favorite_post['category']?></a>
                                    <a href="single-post.php?id=<?=$favorite_post['id']?>&category=<?=$favorite_post['category']?>" class="post-title"><?=$favorite_post['title']?></a>
                                   
                                </div>
                                

                                <!-- Video Duration -->
                                
                            </div>
                        </div>
                        
                        

                        <div class="row">
                            <!-- Single Blog Post -->
                            <div class="col-12 col-md-6">
                                <div class="single-post-area mb-80">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="<?=$favorite_post2['thumbnail']?>" alt="" style="height:250px">

                                        <!-- Video Duration -->
                                        
                                    </div>

                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="archive-list.php?id=<?=$favorite_post2['category_id']?>" class="post-cata cata-sm cata-danger"><?=$favorite_post2['category']?></a>
                                        <a href="single-post.php?id=<?=$favorite_post2['id']?>&category=<?=$favorite_post2['category']?>" class="post-title"><?=$favorite_post2['title']?></a>
                                     
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                                <div class="col-12 col-md-6">
                                    <div class="single-post-area mb-80">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="<?=$favorite_post3['thumbnail']?>" alt="" style="height:250px">

                                            <!-- Video Duration -->
                                           
                                        </div>

                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="archive-list.php?id=<?=$favorite_post3['category_id']?>" class="post-cata cata-sm cata-primary"><?=$favorite_post3['category']?></a>
                                            <a href="single-post.php?id=<?=$favorite_post3['id']?>&category=<?=$favorite_post3['category']?>" class="post-title"><?=$favorite_post3['title']?></a>
                                            <div class="post-meta d-flex">
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
              
                            
                        <?php
                        $query_section="SELECT p.*,c.title as category
                        FROM `posts` p
                        LEFT JOIN categories c ON p.category_id=c.id 
                        WHERE category_id=2 
                        ORDER BY p.created_at ASC limit 5";
                        $result_section=$conn->query($query_section);
                        $posts_section_old=$result_section->fetch_assoc();
                        $posts_section_old_1=$result_section->fetch_assoc();
                        $posts_section=array();
                        while($row=$result_section->fetch_assoc()){
                            $posts_section[]=$row;
                        }
                        $query_section1="SELECT p.*,c.title as category
                        FROM `posts` p
                        LEFT JOIN categories c ON p.category_id=c.id 
                        WHERE category_id=3 
                        ORDER BY p.created_at ASC limit 5";
                        $result_section1=$conn->query($query_section1);
                        $posts_section1_old=$result_section1->fetch_assoc();
                        $posts_section1_old_1=$result_section1->fetch_assoc();
                        $posts_section1=array();
                        while($row=$result_section1->fetch_assoc()){
                            $posts_section1[]=$row;
                        }
                   
                        
                        ?>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <!-- Section Heading -->
                                <div class="section-heading style-2">
                                    <h4><?=mb_strtoupper($posts_section_old['category'],'UTF-8')?></h4>
                                    <div class="line"></div>
                                </div>

                              
                                <div class="sport-video-slides owl-carousel mb-50">
                                    <!-- Single Blog Post -->
                                    <div class="single-post-area">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="<?=$posts_section[0]['thumbnail']?>" alt="">

                                            <!-- Video Duration -->
                                            
                                        </div>

                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="archive-list.php?id=<?=$posts_section[0]['category_id']?>" class="post-cata cata-sm cata-success"><?=$posts_section[0]['category']?></a>
                                            <a href="single-post.php?id=<?=$posts_section[0]['id']?>&category=<?=$posts_section[0]['category']?>" class="post-title"><?=$posts_section[0]['title']?></a>
                                         
                                        </div>
                                    </div>
                                    <div class="single-post-area">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="<?=$posts_section[1]['thumbnail']?>" alt="">

                                            <!-- Video Duration -->
                                           
                                        </div>

                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="archive-list.php?id=<?=$posts_section[1]['category_id']?>" class="post-cata cata-sm cata-success"><?=$posts_section[0]['category']?></a>
                                            <a href="single-post.php?id=<?=$posts_section[1]['id']?>&category=<?=$posts_section[1]['category']?>" class="post-title"><?=$posts_section[1]['title']?></a>
                                        
                                        </div>
                                    </div>
                                    <div class="single-post-area">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="<?=$posts_section[2]['thumbnail']?>" alt="">

                                            <!-- Video Duration -->
                                           
                                        </div>

                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="archive-list.php?id=<?=$posts_section[2]['category_id']?>" class="post-cata cata-sm cata-success"><?=$posts_section[0]['category']?></a>
                                            <a href="single-post.php?id=<?=$posts_section[2]['id']?>&category=<?=$posts_section[2]['category']?>" class="post-title"><?=$posts_section[2]['title']?></a>
                                          
                                        </div>
                                    </div>



                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <!-- Section Heading -->
                                <div class="section-heading style-2">
                                    <h4><?=mb_strtoupper($posts_section1_old['category'],'UTF-8')?></h4>
                                    <div class="line"></div>
                                </div>

                                <!-- Business Video Slides -->
                                <div class="business-video-slides owl-carousel mb-50">
                                    <!-- Single Blog Post -->
                                    <div class="single-post-area">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="<?=$posts_section1[0]['thumbnail']?>" alt="">

                                            <!-- Video Duration -->
                                          
                                        </div>

                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="post-cata cata-sm cata-primary"><?=$posts_section1[0]['category']?></a>
                                            <a href="single-post.php?id=<?=$posts_section1[0]['id']?>&category=<?=$posts_section[0]['category']?>" class="post-title"><?=$posts_section1[0]['title']?></a>
                                           
                                        </div>
                                    </div>

                                    <!-- Single Blog Post -->
                                    <div class="single-post-area">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="<?=$posts_section1[1]['thumbnail']?>" alt="">

                                            <!-- Video Duration -->
                                    
                                        </div>

                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="post-cata cata-sm cata-primary"><?=$posts_section1[1]['category']?></a>
                                            <a href="single-post.php?id=<?=$posts_section1[1]['id']?>&category=<?=$posts_section1[1]['category']?>l" class="post-title"><?=$posts_section1[1]['title']?></a>

                                        </div>
                                    </div>
                                    <div class="single-post-area">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="<?=$posts_section1[2]['thumbnail']?>" alt="" style="height: auto">

                                            <!-- Video Duration -->
                                    
                                        </div>

                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="post-cata cata-sm cata-primary"><?=$posts_section1[2]['category']?></a>
                                            <a href="single-post.php?id=<?=$posts_section1[2]['id']?>&category=<?=$posts_section1[2]['category']?>" class="post-title"><?=$posts_section1[2]['title']?></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-30">
                            <!-- Single Blog Post -->
                            <div class="col-12 col-lg-6">
                                <div class="single-blog-post style-3 d-flex mb-50">
                                    <div class="post-thumbnail">
                                        <img src="<?=$posts_section_old_1['thumbnail']?>" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="single-post.php?id=<?=$posts_section_old_1['id']?>&category=<?=$posts_section_old_1['category']?>" class="post-title"><?=$posts_section_old_1['title']?>?></a>
                                        
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="col-12 col-lg-6">
                                <div class="single-blog-post style-3 d-flex mb-50">
                                    <div class="post-thumbnail">
                                        <img src="<?=$posts_section1_old_1['thumbnail']?>" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="single-post.php?id=<?=$posts_section1_old_1['id']?>&category=<?=$posts_section1_old_1['category']?>" class="post-title"><?=$posts_section1_old_1['title']?></a>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="single-blog-post style-3 d-flex mb-50">
                                    <div class="post-thumbnail">
                                        <img src="<?=$posts_section_old['thumbnail']?>" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="single-post.php?id=<?=$posts_section_old['id']?>&category=<?=$posts_section_old['category']?>" class="post-title"><?=$posts_section_old['title']?></a>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="single-blog-post style-3 d-flex mb-50">
                                    <div class="post-thumbnail">
                                        <img src="<?=$posts_section1_old['thumbnail']?>" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="single-post.php?id=<?=$posts_section1_old['id']?>&category=<?=$posts_section1_old['category']?>" class="post-title"><?=$posts_section1_old['title']?></a>
                                      
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            
                        </div>

                        <!-- Section Heading -->
                        <div class="section-heading style-2">
                            <h4>Bài viết mới nhất</h4>
                            <div class="line"></div>
                        </div>

                        <!-- Featured Post Slides -->
                        <div class="featured-post-slides owl-carousel mb-30">
                            <!-- Single Feature Post -->
                            <div class="single-feature-post video-post bg-img" style="background-image: url(<?=$lastest_post['thumbnail']?>);">
                                <div class="post-content">
                                    <a href="archive-list.php?id=<?=$lastest_post['category_id']?>" class="post-cata"><?=$lastest_post['category']?></a>
                                    <a href="single-post.php?id=<?=$lastest_post['id']?>&category=<?=$lastest_post['category']?>" class="post-title"><?=$lastest_post['title']?></a>
                                </div>

                            
                            </div>

                            <!-- Single Feature Post -->
                           
                        </div>

                        <!-- Single Post Area -->
                        <?php foreach ($lastest_4_posts as $index){ ?>
                        <div class="single-post-area mb-30">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-6">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="<?php echo $index['thumbnail']; ?>" alt="">
<img src="" alt="">
            
                                    
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <!-- Post Content -->
                                    <div class="post-content mt-0">
                                        <a href="archive-list.php?id=<?=$index['category_id']?>" class="post-cata cata-sm cata-success"><?=$index['category']?></a>
                                        <a href="single-post.php?id=<?=$index['id']?>&category=<?=$index['category']?>" class="post-title mb-2"><?=$index['title']?></a>
                                        <div class="post-meta d-flex align-items-center mb-2">
                                            <a href="#" class="post-author">Đăng bởi <?=$index['name']?></a>
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            <a href="#" class="post-date"><?=$index['created_at']?></a>
                                        </div>
                                        <p class="mb-2"><?=$index['description']?></p>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php } ?>

                    </div>
                </div>

                <div class="col-12 col-md-5 col-lg-4">
                    <div class="sidebar-area">

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
                        <div class="single-widget mb-50">
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
                          

                            <!-- Single Blog Post -->
                           
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Vizew Psot Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php  require('php/footer.php');?>
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