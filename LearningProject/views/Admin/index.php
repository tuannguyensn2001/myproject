

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Chào mừng bạn đến trang quản trị</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="./views/Admin/style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <style>
        #content > div:nth-child(2){
            display: flex;
            justify-content: space-evenly;
        }
        .card-text{
            color: white;

        }
        .card{
            width: 200px;
            height: auto;
        }
        .card-body h5{
            font-size: 30px;
        }
        .role{
            display: flex;
            flex-direction: column;
        }
        .role div{
            display: flex;
            justify-content: space-evenly;
        }
        .role div div{
            width: 30%;
        }

    </style>


</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->

     <?php

     require_once ("./views/Admin/components/sidebar.php");

     ?>

        <!-- Page Content  -->
        <div id="content">

            <?php require_once "./views/Admin/components/nav.php";?>
            <div>
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">

                    <div class="card-body">
                        <h5 class="card-title"><?=$data['NumberOfCourse']?></h5>
                        <div class="card-text">Khóa học</div>
                    </div>
                </div>
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">

                    <div class="card-body">
                        <h5 class="card-title"><?=$data['NumberOfUser']?></h5>
                    <div class="card-text">Người dùng</div>
                    </div>
                </div>
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">

                    <div class="card-body">
                        <h5 class="card-title"><?=$data['NumberOfPost']?></h5>
                     <div class="card-text">Bài viết</div>
                    </div>
                </div>
                <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">

                    <div class="card-body">
                        <h5 class="card-title"><?=$data['NumberOfLesson']?></h5>
                        <div class="card-text">Bài giảng</div>
                    </div>
                </div>
                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">

                    <div class="card-body">
                        <h5 class="card-title"><?=$data['NumberOfCategory']?></h5>
                        <div class="card-text">Chủ đề</div>
                    </div>
                </div>
            </div>

            <div>

                <div class="role">
                    <?php
                    $count=count($data['role']) /3;

                    for($i=0;$i < $count;$i++){
                        ?>
                        <div>
                            <?php
                            for($j=0;$j<=2;$j++){
                                if (isset($data['role'][3*$i+$j])){
                                    if ($data['role'][3*$i+$j]['check'] == 1){ ?>
                                        <div class="alert alert-success" role="alert">
                                            <?=$data['role'][3*$i+$j]['name']?>
                                        </div>
                                    <?php } else{ ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?=$data['role'][3*$i+$j]['name']?>

                                        </div>
                                    <?php  }
                                }
                            }
                            ?>
                        </div>
                    <?php } ?>
                </div>
            </div>


    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
            $(".logout").attr("href","Admin/adminLogout");
        });
        let link=document.querySelectorAll(".active li a");
        let link2=document.querySelectorAll(".sidebar-header a");
        document.getElementById("AdminPage").setAttribute("href","Admin");
        for(let i of link){

            let linkSidebar=i.getAttribute("href");
            linkSidebar=linkSidebar.replace("../","");

            i.setAttribute("href",linkSidebar);
        }

    </script>
</body>

</html>