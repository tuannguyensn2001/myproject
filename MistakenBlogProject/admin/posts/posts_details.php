
<?php
session_start();
if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true)
header('Location: ../login.php');
?>
<?php
require_once('../../php/connection.php');
$id=$_GET['id'];
$query="SELECT
p.*,c.title AS category, a.`name`
FROM
posts p
LEFT JOIN categories c ON p.category_id=c.id
LEFT JOIN `authors` a ON p.author_id=a.id
WHERE p.id=$id;
";
$result=$conn->query($query);
$index=$result->fetch_assoc();

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$index['title']?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container" >
        <h1 align="center">BÀI VIẾT CHI TIẾT</h1>
        <hr>
        <h2><?=$index['title']?></h2>

        <div class="text-center"><img src="<?=$index['thumbnail']?>" class="img-fluid rounded" alt="Responsive image" ></div>
        <h5><span style="background-color:green; color:white "><?=$index['category']?> </span> <span style="padding-left:10px"><?=$index['description']?></span></h5>
        <p style="color:black"><?=$index['content']?></p>
        <hr>
        <p style="float:right; font-size:12">Được đăng bởi <?=$index['name']?> vào <?=$index['created_at']?> </p>
    </div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>