<?php
session_start();
if(empty($_SESSION['login'])){
    header("location: ../login.php");
}
if($_SESSION['login']['privilege'] == 1 ){
    header("location: ../index.php");
}
include "../lib/todo.php";
if(isset($_POST['task'])){
    $task = $_POST['task'];
    $body = $_POST['body'];
    $idtodos = $_POST['id'];
    $filetmp = $_FILES['img']['tmp_name'];
    $img = $_FILES['img']['name'];
    move_uploaded_file($filetmp,"../upload/".$img);

    $res = updatetodosby($task,$body,$img,$idtodos);
    if($res ==1 ){
        header("location:../index.php");
    }
}else{
    $todo = gettodobyid($_GET['id']);
    
}
?>


<form action="updatetodo.php" method="post" enctype="multipart/form-data">

    <input type="text" name="task" value="<?=$todo['task']; ?>" >

    <textarea name="body" id="" cols="30" rows="10"><?=$todo['body'];?></textarea>

    <img src="../upload/<?=$todo['img'];?>" width="100px" height="100px">

    <input type="hidden" name="id" value="<?=$todo['id_todos']?>" >
    <!-- no default value for image when i didn't update -->

    <input type="file" value="<?=$todo['img'];?>" name="img">

    <input type="submit" value="update">
</form>