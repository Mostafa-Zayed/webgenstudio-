<?php
session_start();
if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){
    header('location:register.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Task 4">
    <title>Task 4 | Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<?php include_once ('includes/navbar.php');?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Home Page</h3>
                </div>
                <div class="panel-body">

                </div>
            </div>

        </div>
    </div>
</div>
<?php include_once ('includes/footer.php'); ?>
