
<?php
session_start();
if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true)
header('Location: ../login.php');
?>
<?php
require_once('../../php/connection.php');
$query="SELECT * FROM categories";
$result=$conn->query($query);
$category=array();
while($row=$result->fetch_assoc()){
    $category[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

</head>
<body>
    <div class="container" >
    <?php if(isset($_COOKIE['msg'])){ ?>
        <div class="alert alert-warning" role="alert">
       
  <?php echo $_COOKIE['msg'];?>

    </div>
    <?php } ?>
    <form action="posts_add_action.php" class="form-group" enctype="multipart/form-data" method="POST">
   
     <label for="">Tiêu đề</label>
        <input type="text" class="form-control" name="title">
        <label for="">Mô tả</label>
        <input type="text" class="form-control" name="description">
        <label for="">Nội dung</label>
       <textarea id="summernote" cols="30" rows="20" class="form-control" style="overflow-y:scroll"  name="contents"></textarea>
       <label for="">Ảnh</label>
       <input type="file" class="form-control" name="thumbnail">
       <label for="">Danh mục</label>
       <br>
       <select name="category_id" class="form-control" >
           <?php  foreach($category as $index){?>
           <option value="<?=$index['id']?>"><?=$index['title']?></option>
           <?php } ?>
       </select>
       <label for="">Hiển thị bài viết</label>
       <input type="checkbox" value=1 name="status" >
       <hr>
       <button type=submit class="btn btn-success">THÊM MỚI</button>
</form>
    </div>
   
  

            <script>
                $(document).ready(function() {
  $('#summernote').summernote({
      height: 500
  });
  });
            </script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>