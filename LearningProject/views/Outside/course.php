<?php
$id_lesson=$data['id_lesson'];
$name_course=$data['lesson'][0]['course'];
if ($id_lesson==1) $name_lesson=$data['lesson'][0]['name'];
else{
    foreach ($data['lesson'] as $index){
        if ($index['id'] == $id_lesson) $name_lesson=$index['name'];
    }
}

foreach($data['lesson'] as $index){
    if ($index['id']== $id_lesson) $link=$index['video'];
if ($id_lesson ==1) $link=$data['lesson'][0]['video'];
}



?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?=$name_lesson?></title>
        <link rel="icon" href="https://code4func.com/static/res/images/logo_header.png" type="image/gif" sizes="16x16">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../../../views/Outside/css/style.css">
        <link rel="stylesheet" href="../../../views/Outside/css/mediaquery.css">
        <link rel="stylesheet" href="../../../views/Outside/css/course-style.css">
        <style>
            .warning-video{
                height: 558px;

                background-color: black;

            }
            .c-video div{
                left: 0;
                width: 100%;
            }
            .c-video div div *{
                color: white;
            }
        </style>
        <style>
            .users{
                position: relative;
                text-shadow: 0 1px 0 rgba(0,0,0,0.25);
                color: #fff;
                background-color: #212529;
            }
            .users:hover{
                color: #fff;
            }
            .outside-menu-acc{
                position: absolute;
                display: none;
                width: 150px;
            }
            .menu-acc{

                text-align: center;
                list-style-type: none;
                background-color: #ebebeb;

                display: flex;
                flex-direction: column;
            }
            .menu-acc a{
                margin-left: 10px;
                text-decoration: none;
            }
            .menu-acc a:hover{
                color: red;
            }
            .menu-acc .btn{

                margin-left: 0;
                background-color:#e5aa00;
                box-shadow: 0 3px 6px rgba(27,43,106,0.2);
                color: #424242;
                text-shadow: 0 1px rgba(180,0,0,0.16), 0 -1px rgba(255,255,255,0.16);
                border-top-color: rgba(255,255,255,0.5);
                border-bottom-color: rgba(180,0,0,0.2);
            }
            .menu-acc .btn:hover{
                color: #424242;
                box-shadow: 0 6px 14px rgba(27,43,106,0.24);
                background-color: #ffbd00;
            }
        </style>
    </head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark  bg-dark  ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon">
              
              </span>
              
            </button>
            <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
                <a class="navbar-brand" href="../../../"><img src="https://code4func.com/static/res/images/logo_header.png" alt="" width="40px" height="40px">

                </a>
              <ul class="navbar-nav  ">
                <li class="nav-item actived">
                  <a class="nav-link" href="../../../"><b>Trang chủ</b></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><b>Videos</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../../PostController/viewPost"><b>Bài viết</b></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><b>Liên hệ</b></a>
                  </li>
              </ul>
                <div >
                    <?php
                    if (!isset($_SESSION['isLogin']) || $_SESSION['isLogin']==false){ ?>
                        <a href="../../../UserController/signIn" class="btn  sign-in"><b>Đăng nhập</b></a>
                        <a href="" class="btn vip-acc"><b>TÀI KHOẢN VIP</b></a>
                    <?php   }    else{

                        ?>

                        <a href="" class="btn users"><b>Xin chào <?=$_SESSION['dataUser']['username']?></b>

                        </a>
                        <div class="outside-menu-acc">
                            <div class="menu-acc">
                                <a href="">Tài khoản của tôi</a>
                                <a href="../../../CourseController/showMyCourse">Khóa học của tôi</a>
                                <a href="../../../UserController/signOut" class="btn  sign-in"><b>Đăng xuất</b></a>
                            </div>
                        </div>


                    <?php      }
                    ?>
                </div>
             
            </div>
          </nav>
    </header>
    
   <div class="background">
       
         <div class="background-header">
             <h2><?=$name_course?></h2>
             <h1><?=$name_lesson?></h1>

            <div class="c-video">
<!--                --><?php
//
//                if (isset($data['check']) || $id_lesson == 1 || $data['check']){
//                ?>
<!--                    <iframe width="100%" height="558" allowfullscreen-->
<!--                            src="https://www.youtube.com/embed/--><?//=$link?><!--">-->
<!--                    </iframe>-->
<!---->
<!---->
<!--                --><?php //}
//
//                elseif (isset($data['check']) && $data['check'] == 0){ ?>
<!---->
<!--                    <div class="warning-video">-->
<!--                       <div class="warning-video-content">-->
<!--                        <h1>Bạn chưa mua khóa học này</h1>-->
<!--                        <h5 >Thành viên mua khóa học sẽ được giải đáp đầy đủ thắc mắc</h5>-->
<!--                       </div>-->
<!---->
<!--                    </div>-->
<!---->
<!--               --><?php // } ?>

                <?php
                if ($id_lesson==1){ ?>
                <iframe width="100%" height="558" allowfullscreen
                                                src="https://www.youtube.com/embed/<?=$link?>">
                                        </iframe>
               <?php  }
                elseif ($id_lesson!=1 && isset($data['check']) && $data['check'] == 1){ ?>
                    <iframe width="100%" height="558" allowfullscreen
                            src="https://www.youtube.com/embed/<?=$link?>">
                    </iframe>
               <?php } elseif ($id_lesson != 1 && isset($data['check']) && $data['check']==0 || !isset($data['check'])) {?>
                <div class="warning-video">-->
                                           <div class="warning-video-content">
                                            <h1>Bạn chưa mua khóa học này</h1>
                                            <h5 >Thành viên mua khóa học sẽ được giải đáp đầy đủ thắc mắc</h5>
                                           </div>

                                        </div>
                <?php } ?>




        </div>

     </div>
   </div>
  
   <div class="course-details">
       <div>
           <div class="course-header">
            <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
            <span>Bạn sẽ học được những gì</span>
           </div>
           <div class="course-description">
               <p><?=$data['lesson'][0]['description']?></p>

            </p>
           </div>
           <div class="course-list">
               <?php
                $count=0;
               foreach($data['lesson'] as $index){
                   $count++;
                   if ($count == 1){
                   ?>
                   <a href="1" class="btn">
                       <span><?=$index['name']?></span>
                   </a>
                       <?php } else{ ?>
                       <a href="<?=$index['id']?>" class="btn">
                           <span><?=$index['name']?></span>
                       </a>


                <?php } } ?>




           </div>
       </div>
   </div>




    </video>
   
    



   <footer>
    <div>
        <div class="footer-left">
            <a href="">Điều khoản sử dụng</a>
            <a href="">Bảo mật thanh toán</a>
            <a href="">Bảo mật thông tin cá nhân</a>
            <a href="">Giới thiệu Code4Func</a>
        </div>
        <div class="footer-center">
            <h5>Code4Func sẽ giúp bạn những gì</h5>
           <p>Code4Func sẽ đưa tới các bạn những kiến thức cơ bản vững chắc cũng như những kiến thức thực chiến về lập trình đồng thời Code4Func cũng mong muốn cùng bạn góp một phần sức nhỏ để tạo ra các sản phẩm IT chất lượng.</p>
          <a href="" class="btn">XEM CÁC KHÓA HỌC</a>
        </div>
        <div class="footer-right">
            <h5>Theo dõi Code4Func</h5>
            <form action="">
               <div class="form-group">
                <input type="email" placeholder="email@address.com" >
                <button type="submit">Đăng ký</button>
               </div>
            </form>
        </div>
    </div>
</footer>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script >
        var i = 0;
        document.querySelector(".users").onclick=function(event){
            i++;
            event.preventDefault();
            var length=$(event.currentTarget).width();
            document.querySelector(".outside-menu-acc").style.width=length;
            if (i % 2 ==1 ){
                document.querySelector(".outside-menu-acc").style.display="block";

            } else{
                document.querySelector(".outside-menu-acc").style.display="none";
            }
        }


    </script>

</body>
</html>