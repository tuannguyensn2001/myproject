<?php


?>


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
    <script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>

</head>

<body>
    <div class="wrapper">

        <?php require_once "./views/Admin/components/sidebar.php";?>


        <!-- Page Content  -->
        <div id="content">

            <?php require_once "./views/Admin/components/nav.php";?>

            <?php
            if (!isset($data['failed'])){ ?>
                <form action="../AdminPost/createPost" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Tiêu đề bài viết</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả bài viết</label>
                        <input type="text" name="description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nội dung bài viết</label>
                        <textarea name="content" id="editor" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select class="custom-select" name="category_id">

                            <?php foreach($data['listCategory'] as $index){ ?>
                                <option value=<?=$index['id']?>><?=$index['name']?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <hr>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1" value=1 checked name="is_active">
                        <label class="custom-control-label" for="customCheck1"  >Hiển thị bài viết</label>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success">Thêm mới bài viết</button>

                </form>

            <?php }
            else { ?>
                <div class="alert alert-danger alert-2" role="alert" >
                    Bạn không có quyền thêm mới bài viết

                </div>
            <?php } ?>


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
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );


    </script>

</body>

</html>