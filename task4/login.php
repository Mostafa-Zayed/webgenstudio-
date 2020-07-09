<?php
include_once ('db/connect.php');
if(isset($_SESSION['user_id'])){
    header('location:index.php');
}
include_once 'functions.php';
$message = '';
if(isset($_POST['login']) && !empty($_POST['login'])){

    $query = "SELECT * FROM `users` Where email = :email";
    $statement = $connect->prepare($query);
    $statement->execute(array(
        ':email' => $_POST['email']
    ));
    $count = $statement->rowCount();
    if($count > 0){
        $result = $statement->fetchAll();
        $pass = hash('sha512',$_POST['password']);
        foreach ($result as $row){
            if($row['password'] === $pass){
                $_SESSION['user_id'] = $row['id'];
                echo  $_SESSION['user_id'];
                $_SESSION['name'] = $row['name'];
                header('location:index.php');
            }else{
                $message = "<lable>Wrong Password</lable>";
            }

        }

    }else{
        $message = "<lable>Wrong Email</lable>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Task 4">
    <title>Task 4 | Login </title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home.php">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login.php">Login</a></li>
                <li><a href="index.php">Register</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php
            if(!empty($message)){ ?>
                <div class="alert alert-danger">
                    <ul>
                        <li><?=$message;?></li>
                    </ul>
                </div>
            <?php } ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div>
                <div class="panel-body">
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <?php $input = 'email'; ?>
                            <label for="<?=$input;?>"><?=ucfirst($input);?> :</label>
                            <input type="email" id="<?=$input;?>" name="<?=$input;?>" class="form-control" placeholder="<?=ucfirst($input);?>" value="<?=isset($_POST[$input])?$_POST[$input]:''?>">
                        </div>
                        <div class="form-group">
                            <?php $input = 'password'; ?>
                            <label for="<?=$input;?>"><?=ucfirst($input);?> :</label>
                            <input type="password" id="<?=$input;?>" name="<?=$input;?>" class="form-control" placeholder="<?=ucfirst($input);?>">
                        </div>
                        <div class="form-group">
                            <?php $input = 'login'; ?>
                            <input type="submit" id="<?=$input;?>" name="<?=$input;?>" value="<?=ucfirst($input);?>" class="btn btn-default pull-right">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>