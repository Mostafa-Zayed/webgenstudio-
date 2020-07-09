<?php

$connect = new PDO("mysql:host=localhost;dbname=task4","root","");
if(isset($connect) && !empty($connect)){
    session_start();
}
?>


