<?php 
session_start();
require_once('../php/connection.php');
$username=$_POST['username'];
$password=$_POST['password'];

// $query="SELECT a.name,a.id FROM authors a WHERE a.username=' ".$username." ' AND a.password=' ".$password." '";

$query="SELECT * FROM authors";
$result=$conn->query($query);
$author=array();
while($row=$result->fetch_assoc()){
    $author[] = $row;
}

foreach($author as $index){
    if ($index['username'] == $username && $index['password']==$password){
        $checkaccount=true;
        $author_id=$index['id'];
        $name=$index['name'];
    break;
    }
}
if ($checkaccount){
    $_SESSION['author_id']=$author_id;
    $_SESSION['isLogin']=true;
    $_SESSION['name']=$name;
    setcookie('msg','Đăng nhập thành công',time()+5);
    header('Location: index.php');
} else {
    setcookie('msg','Đăng nhập không  thành công',time()+5);
    header('Location: login.php');
}
?>