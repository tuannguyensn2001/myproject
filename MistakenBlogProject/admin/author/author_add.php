
<?php
session_start();
if (!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] != true)
header('Location: ../login.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
</head>
<body>
    <div class="container">
        <?php if(isset($_COOKIE['msg'])){ ?>
            <div class="alert alert-warning" role="alert">
                <?php echo $_COOKIE['msg']; ?>
        </div>
        <?php } ?>
    <form action="author_add_action.php" method="POST" class="form-group">
      
        <label for="">NHẬP TÊN</label>
        <input type="text" class="form-control" name="name">
        <hr>
        <button type="submit" class="btn btn-success">THÊM MỚI</button>

    </form>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>