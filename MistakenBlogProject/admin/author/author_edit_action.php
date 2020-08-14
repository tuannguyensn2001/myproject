
<?php
session_start();
if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true)
header('Location: ../login.php');
?>
<?php 
require_once('../../php/connection.php');
$id=$_POST['id'];
$name=$_POST['name'];
$query="UPDATE `authors` SET `name`=' ".$name." ' WHERE id=$id";
$status=$conn->query($query);
if ($status == true){
    setcookie('msg','Cập nhật  mới thành công',time()+5);
    header('Location: author.php');
} else {
    setcookie('msg','Cập nhật không thành công',time()+5);
    header('Location: author_edit.php?id=' .$id);
}

?>