

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
$id=$_POST['id'];
$query2="SELECT * FROM posts WHERE id=$id";
$result2=$conn->query($query2);
$posts1=$result2->fetch_assoc();

$status=move_uploaded_file($_FILES["thumbnail"]["tmp_name"],$target_file);
if ($status == true){
    // $address="http://localhost/PHP_Learn/PROJECT/img_server/posts/";
    $address="img_server/posts/";
    $thumbnail1=basename($_FILES['thumbnail']['name']);
    $thumbnail=$address.$thumbnail1;
   
} else {
    $thumbnail=$posts1['thumbnail'];
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




$query="UPDATE posts SET content=' ".$contents." ',title=' ".$title." ',author_id=1,description=' ".$description." ',category_id=$category_id,thumbnail=' ".$thumbnail." ',author_id=$author_id  WHERE id=$id" ;
$connect1=$conn->query($query);
if ( $connect1){
    setcookie('msg','Sửa bài viết mới thành công',time()+5);
    header('Location: posts.php');
} else{
    setcookie('msg','Sửa bài viết  không thành công',time()+5);
    header('Location: posts_add.php');
}
?>
