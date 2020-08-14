


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
      .form-add{
          margin: 0 auto;
          width: 600px;

      }

    </style>

</head>

<body>
    <div class="wrapper">

     <?php
     require_once ("./views/Admin/components/sidebar.php");

     ?>

        <!-- Page Content  -->
        <div id="content">

            <?php require_once "./views/Admin/components/nav.php";?>

           <div class="form-add">
               <h5>Thêm mới khóa học</h5>
               <form action="createCourse" method="post" enctype="multipart/form-data">
                   <div class="form-group">
                       <label for="">Ảnh khóa học</label>
                       <input type="file" class="form-control" name="thumbnail">
                   </div>
                   <div class="form-group">
                       <label for="">Khóa học</label>
                       <input type="text" class="form-control" name="name" placeholder="PHP">
                   </div>
                   <div class="form-group">
                       <label for="category">Danh mục</label>
                       <select name="category_id" id="category" class="form-control">
                           <?php foreach ($data['listCategory'] as $index){ ?>
                               <option value=<?=$index['id']?>><?=$index['name']?></option>
                           <?php } ?>
                       </select>
                   </div>
                   <div class="form-group">
                       <label for="">Mô tả khóa học</label>
                       <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Học về PHP"></textarea>
                   </div>
                   <div class="form-group">
                       <label for="">Học phí</label>
                       <input type="text" name="price" class="info-price form-control" placeholder="Free">
                   </div>
                   <div class="form-group d-flex">

                       <div class="custom-control custom-radio custom-control-inline">
                           <input type="radio" id="customRadioInline1" name="is_active" class="custom-control-input info-active" value=1 checked>
                           <label class="custom-control-label" for="customRadioInline1">Sẵn sàng</label>
                       </div>
                       <div class="custom-control custom-radio custom-control-inline">
                           <input type="radio" id="customRadioInline2" name="is_active" class="custom-control-input info-active" value=0>
                           <label class="custom-control-label" for="customRadioInline2">Chưa sẵn sàng</label>
                       </div>

                   </div>
                   <button type="submit" class="btn btn-success">Thêm mới</button>

               </form>
           </div>



    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->

    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script >

        $(document).ready(function () {

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');

            });

        });


    </script>

</body>

</html>