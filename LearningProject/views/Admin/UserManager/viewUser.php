


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Xem người dùng</title>

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
        .alert-danger{
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
            <?php
           if ( isset($_COOKIE['editUser '])){ ?>


            <h5><?=$_COOKIE['editUser']?></h5>
            <?php } ?>
            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên tài khoản</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['listUser'] as $index){ ?>
                    <tr>
                        <th scope="row"><?=$index['id']?></th>
                        <td><?=$index['username']?></td>
                        <td><?=$index['email']?></td>
                        <td ><button class="btn btn-primary view-details" content="<?=$index['id']?>" data-toggle="modal" data-target="#viewUser"><i class='fas fa-eye ' style='font-size:24px'  ></i></button>

                        </td>

                    </tr>
                <?php } ?>

                </tbody>
            </table>

            <div class="modal fade" id="viewUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa người dùng</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert alert-danger" role="alert">
                           Bạn không có quyền này
                        </div>
                        <form action="editUser" method="post" enctype="multipart/form-data">
                            <input type="text" class="info-id" hidden name="id">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="">Tài khoản</label>
                                <input type="text" name="username" class="info-username form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="info-email form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Đặt lại mật khẩu</label>
                                <input type="password" name="password" class="info-password form-control">
                            </div>
                          <div class="form-group">
                              <label for="">Khóa học </label>
                          <?php foreach ($data['listCourse'] as $index){ ?>
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="<?=$index['id']?>" id="course-<?=$index['id']?>" value="<?=$index['id']?>"  >
                                  <label class="form-check-label" for="<?=$index['id']?>">
                                      <?=$index['name']?>
                                  </label>
                              </div>
                              <?php } ?>
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
        var elementCheckbox=document.querySelectorAll(".form-check > input");
        $(document).ready(function () {

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');

            });
            $(".view-details").click(function (e) {

                for(let i of elementCheckbox){
                    i.removeAttribute("checked");
                }
                var id=$(this).attr("content");
                $.ajax({
                    type: "POST",
                    url: "showUser",
                    data: {
                        id,
                    },
                    success: function (data) {
                        var result = JSON.parse(data);
                      if (result != 0){
                          result['mycourse'] = JSON.parse(result['mycourse']);
                          var mycourse = [];
                          document.querySelector(".info-id").setAttribute("value",result['id']);
                          document.querySelector(".info-username").setAttribute("value",result['username']);
                          document.querySelector(".info-email").setAttribute("value",result['email']);
                          for(let i in result['mycourse']) {
                              let element = document.getElementById("course-" + i);

                              if (result['mycourse'][i] == 1 && element) {
                                  element.setAttribute("checked", "checked");
                              }

                          }
                      } else{
                         $("form").hide();
                         document.querySelector(".alert-danger").style.display="block";


                      }
                    }
                })
            })

        });


    </script>

</body>

</html>