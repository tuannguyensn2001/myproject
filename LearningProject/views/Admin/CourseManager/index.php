


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Xem khóa học</title>

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
                    <th scope="col">Tên khóa học</th>
                    <th scope="col">Thể loại</th>
                    <th scope="col"><a href="createCourse" class="btn btn-primary">Thêm mới</a></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['listCourse'] as $index){ ?>
                    <tr>
                        <th scope="row"><?=$index['id']?></th>
                        <td><?=$index['name']?></td>
                        <td><?=$index['category']?></td>
                        <td ><button class="btn btn-primary view-details" content="<?=$index['id']?>" data-toggle="modal" data-target="#exampleModal"><i class='fas fa-eye ' style='font-size:24px'  ></i></button>
                            <a href="deleteCourse/<?=$index['id']?>" class="btn btn-danger">XÓA</a>
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
                        <form action="editCourse" method="post" enctype="multipart/form-data">
                            <input type="text" class="info-id" hidden name="id">
                        <div class="modal-body">
                           <div class="form-group d-flex justify-content-evenly">
                               <label for=""><img src="" alt="" class="info-img" width="200" height="100">

                               <input type="file"  width="200" name="thumbnail">
                           </div>
                            <div class="form-group">
                                <label for="">Khóa học</label>
                                <input type="text" name="name" class="info-name form-control">
                            </div>
                            <div class="form-group">
                                <label for="category">Danh mục</label>
                                <select name="category_id" id="category">
                            <?php foreach ($data['listCategory'] as $index){ ?>
                                <option value=<?=$index['id']?>><?=$index['name']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả khóa học</label>
<!--                                <input type="text" name="description" class="info-description form-control" style="height:200px; max-width: 100%">-->
                                <textarea name="description" id="" cols="30" rows="10" class="info-description form-control" ></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Học phí</label>
                                <input type="text" name="price" class="info-price form-control">
                            </div>
                            <div class="form-group d-flex">

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="is_active" class="custom-control-input info-active" value=1>
                                    <label class="custom-control-label" for="customRadioInline1">Sẵn sàng</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="is_active" class="custom-control-input info-active" value=0>
                                    <label class="custom-control-label" for="customRadioInline2">Chưa sẵn sàng</label>
                                </div>
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
                elementClear.forEach(function(index){
                    for(let j of index){
                        j.removeAttribute("checked");
                        j.removeAttribute("selected");
                    }
                })
               $.ajax({
                   type:"POST",
                   url: "showCourse",
                   data:{
                        content,
                   },
                   success:function (fill) {
                    var result=JSON.parse(fill);
                    console.log(result);
                  if (result != 0){
                       result=JSON.parse(fill)['courseDetails'];
                      for(let i in result){
                          if (parseInt(result[i])) result[i] = parseInt(result[i]);
                      }

                      $(".info-id").attr("value",result['id']);

                      $(".info-img").attr("src","../views/Outside/img/course/"+result['id']+"/thumbnail."+result['typethumbnail']);

                      $(".info-name").attr("value",result['name']);
                      for (let i of category){

                          if (i.value == result['category_id']){
                              i.setAttribute("selected","selected");

                          }
                      }
                      $(".info-description").val(result['description']);
                      $(".info-price").val(result['price']);



                      for(let j of active){
                          if (j.value == result['is_active']){
                              j.setAttribute("checked","checked");
                          }

                      }
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
        });


    </script>

</body>

</html>