
<?php
session_start();
if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true)
header('Location: ../login.php');
?>

<?php
require_once('../../php/connection.php');
$id=$_POST['id'];
$name=$_POST['name'];
$query="INSERT INTO authors(name) VALUES ('".$name."')";
$status=$conn->query($query);
if ($status == true){
    setcookie('msg','Thêm mới thành công',time()+5);
    header('Location: author.php');
} else{
    setcookie('msg','Thêm mới không thành công',time()+5);
    header('Location: author_add.php');
}


?>
