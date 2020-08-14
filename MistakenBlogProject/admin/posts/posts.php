
<?php
session_start();
if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true)
header('Location: ../login.php');
?>

<?php
require_once('../../php/connection.php');
$query="SELECT
p.*,c.title AS category, a.`name`
FROM
posts p
LEFT JOIN categories c ON p.category_id=c.id
LEFT JOIN `authors` a ON p.author_id=a.id
ORDER BY p.created_at DESC
";
$result=$conn->query($query);
$posts=array();
while($row=$result->fetch_assoc()){
    $posts[]=$row;
}

?>





<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
</head>
<body>

    <div class="container">
        <?php if(isset($_COOKIE['msg'])){ ?>
  <div class="alert alert-success" role="alert"><?php echo $_COOKIE['msg'];?></div>
        <?php } ?>
        <a href="posts_add.php"><button class="btn btn-primary">THÊM MỚI</button></a>
        <table class="table">
            <thead class="thead-dark">
            <tr>
            <th scope="col">Tiêu đề</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Tác giả</th>
            <th scope="col">Danh mục</th>
            <th scope="col">Ngày đăng</th>
            <th scope="col">Chức năng</th>
            </tr>
            </thead>
            <tbody>
                <?php  foreach($posts as $index){ ?>
                    <tr>
                    <th scope="row"><?=$index['title']?></th>
                    <td><?=$index['description']?></td>
                    <td><?=$index['name']?></td>
                    <td><?=$index['category']?></td>
                    <td><?=$index['created_at']?></td>
                   <td>
                    <a href="posts_details.php?id=<?=$index['id']?>"><button class="btn btn-info">XEM</button></a>
                       <a href="posts_edit.php?id=<?=$index['id']?>"><button class="btn btn-primary">SỬA</button></a>
                       <a href="posts_delete_action.php?id=<?=$index['id']?>"><button class="btn btn-success">XÓA</button></a>
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