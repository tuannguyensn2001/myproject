


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Xem quyền</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../views/Admin/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <style>
        .fa-eye:hover{
            cursor:pointer;
        }
        .information{
            display: none;
        }

    </style>

</head>

<body>
    <div class="wrapper">

        <?php require_once "./views/Admin/components/sidebar.php";?>

        <!-- Page Content  -->
        <div id="content">

            <?php require_once "./views/Admin/components/nav.php";?>
            <?php if (isset($_COOKIE['failed_admin'])){ ?>
                <div class="alert alert-danger" role="alert" >
                    Bạn không có quyền này
                </div>
            <?php } ?>

            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên danh mục</th>

                    <th scope="col"><a href="" class="btn btn-primary addRole" data-toggle="modal" data-target="#exampleModal">Thêm mới</a></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['listRole'] as $index){ ?>
                    <tr>
                        <th scope="row"><?=$index['id']?></th>
                        <td><?=$index['name']?></td>

                        <td ><button class="btn btn-primary view-details" content="<?=$index['id']?>" data-toggle="modal" data-target="#exampleModal"><i class='fas fa-eye ' style='font-size:24px'  ></i></button>
                            <a href="deleteRole/<?=$index['id']?>" class="btn btn-danger deleteRole">XÓA</a>
                        </td>

                    </tr>
                <?php } ?>

                </tbody>
            </table>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa khóa học</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert alert-danger alert-2" role="alert" style="display: none">
                            Bạn không có quyền này
                        </div>
                        <form action="editRole" method="post" enctype="multipart/form-data">
                            <input type="text" class="info-id" hidden name="id">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Tên danh mục</label>
                                <input type="text" class="form-control" name="name" id="info-name" >
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-submit">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->

    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->

    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script >
        var category=document.getElementsByTagName("option");
        var active = document.getElementsByClassName("info-active");
        var elementClear =[category,active];
        $(document).ready(function () {
            $("textarea").focus(function(){
                console.log($(this).val());
            })
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');

            });
        $(".view-details").click(function () {
               var content = $(this).attr("content");
            $(".modal-title").html("Chỉnh sửa  quyền");
            $(".modal form").attr("action","editRole");
               $.ajax({
                   type:"POST",
                   url: "showRole",
                   data:{
                        content,
                   },
                   success:function (fill) {
                    var result=JSON.parse(fill);

                  if (result != 0){
                       result=JSON.parse(fill);


                    $(".info-id").attr("value",result['id']);
                      $("#info-name").attr("value",result['name']);






                  } else{
                      $("form").hide();
                      document.querySelector(".alert-2").style.display="block";
                  }

                   },
                   error:function(){
                       console.log("loi roi");
                   }
               })
        });
        $(".addRole").click(function (event) {
                event.preventDefault();
            $(".modal form").attr("action","addRole");
                $(".modal-title").html("Thêm quyền");
                $(".info-id").attr("value","");
                $("#info-name").attr("value","");
        });
        $(".deleteRole").click(function (event) {
                let check=confirm("Bạn có chắc chắn muốn xóa quyền này ?");
                if (!check)
                event.preventDefault();
        })
        });


    </script>

</body>

</html>