
<?php
session_start();
if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true)
header('Location: ../login.php');
?>
<?php 
require_once('../../php/connection.php');
$id=$_POST['id'];
$title=$_POST['title'];
$query="UPDATE categories SET title=' ".$title." ' where id=$id";
$status=$conn->query($query);
if ($status == true){
    setcookie('msg','Cập nhật thành công mới thành công',time()+5);
    header('Location: category.php');
} else {
    setcookie('msg','Cập nhật không thành công không thành công',time()+5);
    header('Location: category_edit.php?id=' .$id);
}
?>
