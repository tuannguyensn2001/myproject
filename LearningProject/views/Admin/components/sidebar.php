<nav id="sidebar">
            <div class="sidebar-header" style="
            padding-left: 10px;
             padding-right: 10px;
             background-color: rgb(55,60,182);

                ">
                <a href="../Admin" class="" id="AdminPage"  style="font-size:25px;">QUẢN TRỊ ADMIN</a>
            </div>

            <ul class="list-unstyled components">

                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">QUẢN LÝ KHÓA HỌC</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="../AdminCourse/viewCourse" class="link-viewCourse">Xem các khóa học</a>
                        </li>


                    </ul>
                </li>
                <li class="active">
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">QUẢN LÝ NGƯỜI DÙNG</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu1">
                        <li>
                            <a href="../AdminUser/viewUser" class="link-viewCourse">Xem người dùng</a>
                        </li>


                    </ul>
                </li>
                    <li class="active">
                        <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">QUẢN LÝ BÀI GIẢNG</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu3">
                        <li>
                            <a href="../AdminLesson/viewLesson" class="link-viewCourse">Xem bài giảng</a>
                        </li>


                    </ul>
                </li>
                </li>
                <li class="active">
                    <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">QUẢN LÝ BÀI VIẾT</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu4">
                        <li>
                            <a href="../AdminPost/viewPost" class="link-viewCourse">Xem bài viết</a>
                        </li>

                        <li>
                            <a href="../AdminPost/addPosts">Thêm bài viết</a>
                        </li>
                    </ul>
                </li>

                <li class="active">
                    <a href="#homeSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">QUẢN LÝ DANH MỤC</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu5">
                        <li>
                            <a href="../AdminCategory/viewCategory" class="link-viewCourse">Xem danh mục</a>
                        </li>


                    </ul>
                </li>

                        <?php
                        if ($_SESSION['adminInfo']['role'] == "Manager"){
                            ?>
                        <li class="active">
                            <a href="#homeSubmenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">QUẢN LÝ QUYỀN</a>
                            <ul class="collapse list-unstyled" id="homeSubmenu6">
                                <li>
                                    <a href="../AdminRole/viewRole" class="link-viewCourse">Xem quyền</a>
                                </li>
                            <li>
                                <a href="../AdminUser/viewAdmin" class="link-viewCourse">Phân  quyền</a>
                            </li>
                            </ul>
                        </li>
                        <?php } ?>






            </ul>
<!---->
<!--            <ul class="list-unstyled CTAs">-->
<!--                <li>-->
<!--                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>-->
<!--                </li>-->
<!--            </ul>-->
        </nav>