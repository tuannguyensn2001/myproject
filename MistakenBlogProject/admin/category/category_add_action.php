

<?php
session_start();
if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true)
header('Location: ../login.php');
?>
<?php
require_once('../../php/connection.php');
$id=$_POST['id'];
$title=$_POST['title'];
$query="INSERT INTO categories(title) VALUES ('".$title."');";
$status=$conn->query($query);
if ($status == true){
    setcookie('msg','Thêm mới thành công',time()+5);
    header('Location: category.php');
} else {
    setcookie('msg','Thêm mới không thành công',time()+5);
    header('Location: category_add.php');
}


?>