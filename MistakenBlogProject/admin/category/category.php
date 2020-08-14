
<?php
session_start();
if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true)
header('Location: ../login.php');
?>
<?php 
require_once('../../php/connection.php');
$query="SELECT * FROM `categories`";
$result=$conn->query($query);
$category=array();
while($row=$result->fetch_assoc()){
    $category[] = $row;
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUẢN TRỊ DANH MỤC</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <a href="category_add.php"><button type="button" class="btn btn-success">Thêm mới</button></a>
    <hr>
    <?php if(isset($_COOKIE['msg'])){ ?>
        <div class="alert alert-success" role="alert">
   <?php echo  $_COOKIE['msg'];?>
    </div>
    <?php } ?>
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope=col>Function</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($category as $index){ ?>
            <tr>
            <th scope="row"><?=$index['id']?></th>
            <td><?=$index['title']?></td>
            <td>
            
            <a href="category_edit.php?id=<?=$index['id']?>"><button type="text" class="btn btn-primary">Edit</button></a>
            <a href="category_delete_action.php?id=<?=$index['id']?>"><button type="text" class="btn btn-info">Delete</button></a>
            </td>
            </tr>
       <?php  } ?>
        </tbody>
        </table>
       
  
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>