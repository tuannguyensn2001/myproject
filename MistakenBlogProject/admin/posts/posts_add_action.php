
<?php
session_start();
if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true)
header('Location: ../login.php');
?>
<?php

session_start();
require_once('../../php/connection.php');
$target_dir="../../img_server/posts/";
$thumbnail="";
$target_file=$target_dir.basename($_FILES["thumbnail"]["name"]);

$status=move_uploaded_file($_FILES["thumbnail"]["tmp_name"],$target_file);
if ($status == true){
    $address="img_server/posts/";
    $thumbnail1=basename($_FILES['thumbnail']['name']);
    $thumbnail=$address.$thumbnail1;
   
}
$status_posts=0;
if (isset($_POST['status'])) $status_posts=1;
$title=$_POST['title'];
$description=$_POST['description'];
$contents=$_POST['contents'];
$category_id=$_POST['category_id'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$created_at =  date('Y-m-d H:i:s');
$author_id=$_SESSION['author_id'];


$query="INSERT INTO posts(title,description,content,category_id,status,created_at,thumbnail,author_id) VALUES('".$title."','".$description."','".$contents."',$category_id,$status_posts,'".$created_at."','".$thumbnail."',$author_id)";
$connect1=$conn->query($query);
if ( $connect1){
    setcookie('msg','Thêm bài viết mới thành công',time()+5);
    header('Location: posts.php');
} else{
    setcookie('msg','Thêm bài viết mới không thành công',time()+5);
    header('Location: posts_add.php');
}
?>
