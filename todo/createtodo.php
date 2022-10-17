<?php
session_start();
if(empty($_SESSION['login'])){
    header("location: ../login.php");
}
if($_SESSION['login']['privilege'] == 1 ){
    header("location: ../index.php");
}

include "../lib/todo.php";

if(isset($_POST['title'])){
    $title     =  $_POST['title'];
    $body      =  $_POST['body'];
    $file_temp =  $_FILES['img']['tmp_name'];
    $img       =  $_FILES['img']['name'];
    $resul     =  move_uploaded_file($file_temp,"../upload/".$img);
    $userID    =  $_SESSION['login']['id'];
    $result    =  addtodo($title,$body,$img,$userID);
    if($result == 1){   
        header("location: ../index.php");   
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="createtodo.php" method="post" enctype="multipart/form-data">
        <input type="text" name="title">
        <textarea name="body" id="desc" cols="30" rows="10"></textarea>
        <input type="file" name="img">
        <button type="submit">save</button>
    </form>
</body>
</html>