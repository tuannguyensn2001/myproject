
<?php
session_start();
if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true)
header('Location: ../login.php');
?>
<?php 
require_once('../../php/connection.php');
$id=$_GET['id'];

$query="DELETE FROM categories WHERE id=$id";
$status=$conn->query($query);
if ($status == true){
    setcookie('msg','Xóa thành công  ',time()+5);
    header('Location: category.php');
} else {
    setcookie('msg','Xóa không thành công ',time()+5);
}
header('Location: category.php');
?>