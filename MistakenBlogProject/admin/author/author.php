

<?php
session_start();
if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true)
header('Location: ../login.php');
?>
<?php 
require_once('../../php/connection.php');
$query="SELECT * FROM `authors`";
$result=$conn->query($query);
$authors=array();
while($row=$result->fetch_assoc()){
    $authors[] = $row;
}

?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUẢN TRỊ TÁC GIẢ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
    <?php if(isset($_COOKIE['msg'])){ ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_COOKIE['msg']; ?>
        </div>
        <?php } ?>
    <a href="author_add.php"><button class="btn btn-success">NEW  </button></a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Function</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($authors as $index){ ?>
                <tr>
                    <th scope="row"><?=$index['id']?></th>
                    <td><?=$index['name']?></td>
                    <td>
                        <a href="author_edit.php?id=<?=$index['id']?>"><button class="btn btn-primary">EDIT</button></a>
                        <a href="author_delete_action.php?id=<?=$index['id']?>"><button class="btn btn-info">DELETE</button></a>
                </tr>
            <?php } ?>
        </tbody>
    </table>



    </div>








<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>