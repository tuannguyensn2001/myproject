<?php 
require_once('php/connection.php');
$id=$_GET['id'];
$query="SELECT p.*,c.title as category,a.name
FROM `posts` p
LEFT JOIN categories c ON p.category_id=c.id 
LEFT JOIN authors a ON p.author_id=a.id
WHERE p.id=$id
";
$result=$conn->query($query);
$posts=$result->fetch_assoc();
$category=$_GET['category'];

$query1="SELECT * FROM categories";
$result1=$conn->query($query1);
$listcategory=array();
while($row=$result1->fetch_assoc()){
    $listcategory[]=$row;
}
$category_id=$posts['category_id'];

$query2="SELECT * FROM posts where category_id=$category_id";
$result2=$conn->query($query2);
$list_posts_category=array();
while($row=$result2->fetch_assoc()){
    $list_posts_category[]=$row;
}


for($i=0;$i<count($list_posts_category);$i++){
    if ($list_posts_category[$i]['id']==$id) $k=$i;
}



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
    <title><?=$posts['title']?></title>

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
                    <?php require('php/nav.php');    ?>
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
                            <li class="breadcrumb-item"><a href="archive-list.php?id=<?=$category_id?>"><?=$category?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?=$posts['title']?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <?php if ($k==0){ ?>

        <div class="vizew-pager-next">
            <p>BÀI VIẾT TIẾP THEO</p>

            <!-- Single Feature Post -->
            <div class="single-feature-post video-post bg-img pager-article" style="background-image: url(<?=$list_posts_category[$k+1]['thumbnail']?>);">
                <!-- Post Content -->
                <div class="post-content">
                    <a href="archive-list.php?id=<?=$posts['category_id']?>" class="post-cata cata-sm cata-business"><?=$category?></a>
                    <a href="single-post.php?id=<?=$list_posts_category[$k+1]['id']?>&category=<?=$category?>" class="post-title"><?=$list_posts_category[$k+1]['title']?></a>
                   
                </div>
                <!-- Video Duration -->
                
            </div>
        </div>
        
    <?php } 
    else if ($k==(count($list_posts_category)-1)) { ?>
    <div class="vizew-pager-prev">
            <p>BÀI VIẾT KẾ TRƯỚC</p>

            <!-- Single Feature Post -->
            <div class="single-feature-post video-post bg-img pager-article" style="background-image: url(<?=$list_posts_category[$k-1]['thumbnail']?>);">
                <!-- Post Content -->
                <div class="post-content">
                    <a href="archive-list.php?id=<?=$posts['category_id']?>" class="post-cata cata-sm cata-success"><?=$category?></a>
                    <a href="single-post.php?id=<?=$list_posts_category[$k-1]['id']?>&category=<?=$category?>" class="post-title"><?=$list_posts_category[$k-1]['title']?></a>
                   
                </div>
                <!-- Video Duration -->
             
            </div>
        </div>
    <?php } else{ ?>
        <div class="vizew-pager-prev">
            <p>BÀI VIẾT KẾ TRƯỚC</p>

            <!-- Single Feature Post -->
            <div class="single-feature-post video-post bg-img pager-article" style="background-image: url(<?=$list_posts_category[$k-1]['thumbnail']?>);">
                <!-- Post Content -->
                <div class="post-content">
                    <a href="archive-list.php?id=<?=$posts['category_id']?>" class="post-cata cata-sm cata-success"><?=$category?></a>
                    <a href="single-post.php?id=<?=$list_posts_category[$k-1]['id']?>&category=<?=$category?>" class="post-title"><?=$list_posts_category[$k-1]['title']?></a>
                    
                </div>
              
                
            </div>
        </div>

        <div class="vizew-pager-next">
            <p>BÀI VIẾT TIẾP THEO</p>

            <!-- Single Feature Post -->
            <div class="single-feature-post video-post bg-img pager-article" style="background-image: url(<?=$list_posts_category[$k+1]['thumbnail']?>);">
                <!-- Post Content -->
                <div class="post-content">
                    <a href="archive-list.php?id=<?=$posts['category_id']?>" class="post-cata cata-sm cata-business"><?=$category?></a>
                    <a href="single-post.php?id=<?=$list_posts_category[$k+1]['id']?>&category=<?=$category?>" class="post-title"><?=$list_posts_category[$k+1]['title']?></a>
                    
                </div>
               
            
            </div>
        </div>



    <?php } ?>
    <div class="vizew-pager-area">
    

        
    </div>
    <!-- ##### Pager Area End ##### -->

    <!-- ##### Post Details Area Start ##### -->
    <section class="post-details-area mb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- Post Details Content Area -->
                <div class="col-12 col-lg-8 col-xl-7">
                    <div class="post-details-content">
                        <!-- Blog Content -->
                        <div class="blog-content">

                            <!-- Post Content -->
                            <div class="post-content mt-0">
                                <a href="archive-list.php?id=<?=$posts['category_id']?>" class="post-cata cata-sm cata-danger"><?=$posts['category']?></a>
                                <p style="color:white; font-size:30px"><?=$posts['title']?></p>

                                <div class="d-flex justify-content-between mb-30">
                                    <div class="post-meta d-flex align-items-center">
                                        <a href="#" class="post-author">Đăng bởi <?=$posts['name']?></a>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <a href="#" class="post-date"><?=$posts['created_at']?></a>
                                    </div>
                                    
                                </div>
                            </div>
                            <p style="font-size:15px"><b><?=$posts['description']?></b></p>
                            <div class="content" style="color:white !important">

                            <?php echo $posts['content']; ?>
                            </div>
                       
                           <p style="font-size:10px; text-align:right"><i>My Website via <a href="https://techtalk.vn/">Techtalk</a></i></p>

                            <!-- Post Tags -->
                            <div class="post-tags mt-30">
                                <ul>
                                    <?php foreach ($listcategory as $index){ ?>
                                    <li><a href="archive-list.php?id=<?=$index['id']?>"><?=$index['title']?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>

                            <!-- Post Author -->
                            

                            <!-- Related Post Area -->
                            <div class="related-post-area mt-5">
                                <!-- Section Title -->
                                <div class="section-heading style-2">
                                    <h4>BÀI VIẾT LIÊN QUAN</h4>
                                    <div class="line"></div>
                                </div>

                                <div class="row">

                                   <?php $random=rand(0,(count($list_posts_category)-1));
                                   $random1=rand(0,(count($list_posts_category)-1));
                                   while ( $random == $random1){
                                    $random=rand(0,(count($list_posts_category)-1));
                                    $random1=rand(0,(count($list_posts_category)-1));
                                   }
                                   ?>
                                    <div class="col-12 col-md-6">
                                        <div class="single-post-area mb-50">
                                            <!-- Post Thumbnail -->
                                            <div class="post-thumbnail">
                                                <img src="<?=$list_posts_category[$random]['thumbnail']?>" alt=""  style="height:250px; width:275px">

                                                <!-- Video Duration -->
                                               
                                            </div>

                                            <!-- Post Content -->
                                            <div class="post-content">
                                                <a href="archive-list.php?id=<?=$category_id?>" class="post-cata cata-sm cata-success"><?=$category?></a>
                                                <a href="single-post.php?id=<?=$list_posts_category[$random]['id']?>&category=<?=$category?>" class="post-title"><?=$list_posts_category[$random]['title']?></a>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-md-6">
                                        <div class="single-post-area mb-50">
                                            <!-- Post Thumbnail -->
                                            <div class="post-thumbnail">
                                                <img src="<?=$list_posts_category[$random1]['thumbnail']?>"  style="height:250px; width:275px">

                                                <!-- Video Duration -->
                                              
                                            </div>

                                            <!-- Post Content -->
                                            <div class="post-content">
                                                <a href="archive-list.php?id=<?=$category_id?>" class="post-cata cata-sm cata-success"><?=$category?></a>
                                                <a href="single-post.php?id=<?=$list_posts_category[$random1]['id']?>&category=<?=$category?>" class="post-title"><?=$list_posts_category[$random1]['title']?></a>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                            <!-- Comment Area Start -->
                           

                            <!-- Post A Comment Area -->
                            

                        </div>
                    </div>
                </div>

                <!-- Sidebar Widget -->
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="sidebar-area">

                        <!-- ***** Single Widget ***** -->
                        

                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget p-0 author-widget" >
                            <div class="p-4">
                                <img class="author-avatar" src="img/bg-img/tuan.png" alt="">
                                <a href="#" class="author-name">Nguyễn Văn Tuấn</a>
                                <div class="author-social-info">
                                    <a href="https://www.facebook.com/tuannguyensn2001/" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <a href="https://github.com/tuannguyensn2001" target="_blank"><i class="fa fa-github"></i></a>
                                   
                                </div>
                                <p>Work hard, play hard !</p>
                            </div>
                           

                       
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Post Details Area End ##### -->

    <?php require('php/footer.php'); ?>


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