<?php 
require_once('connection.php');


?>
<footer class="footer-area">
        <div class="container">
            <div class="row">
                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="footer-widget mb-70">
                        <!-- Logo -->
                        <a href="./index.php" class="foo-logo d-block mb-4"><img src="img/core-img/logo5.png" alt=""></a>
                        
                        <!-- Footer Newsletter Area -->
                        <div class="footer-nl-area">
                            <form action="#" method="post">
                              
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="footer-widget mb-70">
                        <h6 class="widget-title">Tin mới nhất</h6>
                        <!-- Twitter Slides -->
                        <div class="twitter-slides owl-carousel">

                           <?php
                           $query_footer="SELECT * FROM posts ORDER BY created_at DESC limit 4";
                           $result_footer=$conn->query($query_footer);
                           $posts_footer=array();
                           while($row=$result_footer->fetch_assoc()){
                               $posts_footer[] = $row;
                           }
                           
                           ?>
                            <div class="single--twitter-slide">
                                <!-- Single Twit -->
                                <div class="single-twit">
                                    <p><i class="fa fa-bookmark"></i> <span>
                                    </span><?=$posts_footer[0]['title']?> </p>
                                  
                                </div>
                                <!-- Single Twit -->
                                <div class="single-twit">
                                    <p><i class="fa fa-bookmark"></i> <span></span><?=$posts_footer[1]['title']?></p>
                                </div>
                            </div>

                            <!-- Single Twitter Slide -->
                            <div class="single--twitter-slide">
                                <!-- Single Twit -->
                                <div class="single-twit">
                                    <p><i class="fa fa-bookmark"></i> <span></span> <?=$posts_footer[2]['title']?></p>
                                </div>
                                <!-- Single Twit -->
                                <div class="single-twit">
                                    <p><i class="fa fa-bookmark"></i> <span></span><?=$posts_footer[3]['title']?></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="footer-widget mb-70">
                        <h6 class="widget-title">Liên hệ</h6>
                        <!-- Contact Address -->
                        <div class="contact-address">
                            <p>Nguyễn Văn Tuấn - Hanoi University of Science - VietNam University</p>
                            <p>Email: nguyenvantuan_t64@hus.edu.vn</p>
                            <p></p>
                        </div>
                        <!-- Footer Social Area -->
                        <div class="footer-social-area">
                            <a href="https://www.facebook.com/tuannguyensn2001/" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://github.com/tuannguyensn2001" class="github" target="_blank"><i class="fa fa-github"></i></a>
                          
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copywrite Area -->
        <div class="copywrite-area">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Copywrite Text -->
                    <div class="col-12 col-sm-6">
                        <p class="copywrite-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                    <div class="col-12 col-sm-6">
                        
                    </div>
                </div>
            </div>
        </div>
    </footer>