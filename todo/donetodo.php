<?php
session_start();

if(empty($_SESSION['login'])){
    header("location: ../login.php");
}
if($_SESSION['login']['privilege'] == 1 ){
    header("location: ../index.php");
}

include "../lib/todo.php";

// print_r($_GET);
$res = doneToDo($_GET['id']);
if($res == 1){
header("location: ../index.php");
}
