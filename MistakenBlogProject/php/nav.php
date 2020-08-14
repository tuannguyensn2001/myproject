<?php
require_once('connection.php');
$query="SELECT * FROM categories";
$result=$conn->query($query);
$categories=array();
while($row=$result->fetch_assoc()){
    $categories[]= $row;
}


?>


<nav class="classy-navbar justify-content-between" id="vizewNav">

<!-- Nav brand -->
<a href="./index.php" class="nav-brand"><img src="img/core-img/logo1.png" alt=""></a>

<!-- Navbar Toggler -->
<div class="classy-navbar-toggler">
    <span class="navbarToggler"><span></span><span></span><span></span></span>
</div>

<div class="classy-menu">

    <!-- Close Button -->
    <div class="classycloseIcon">
        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
    </div>

    <!-- Nav Start -->
    <div class="classynav">
        <ul>
            <li class="active"><a href="index.php">Trang chủ</a></li>
            <?php  foreach ($categories as $index) {?>
            <li><a href="archive-list.php?id=<?=$index['id']?>"><?=$index['title']?></a></li>
            <?php } ?>  
    
        </ul>
    </div>
    <!-- Nav End -->
</div>
</nav>