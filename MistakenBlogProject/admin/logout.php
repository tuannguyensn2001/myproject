<?php
session_start();
session_destroy();
setcookie('msg','Bạn đã đăng xuất',time()+5);
header('Location: login.php');
?>