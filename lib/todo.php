<?php
include "connection.php";
// ..........[create]............. the task in table 
function addtodo($title, $body, $img, $userID)
{
    $connection = connection();
    mysqli_query($connection, "INSERT INTO todos SET task = '$title',body = '$body', user_id = '$userID',img = '$img'");
    return mysqli_affected_rows($connection);
}
// ***************************************************
// ..........[read].............data from table todo by user_id
function readtoDobyuser_id($userId)
{
    $connection = connection();
    $res = mysqli_query($connection, "SELECT * FROM `todos` WHERE `user_id` = $userId");
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}
// ***************************************************
// ..........[done the task ].............by change color
function doneToDo($todosId)
{
    $connection = connection();
    $result = mysqli_query($connection, "SELECT * FROM `todos` WHERE `id_todos` = $todosId ");
    $data = mysqli_fetch_assoc($result);
    if ($data['stutas'] == 0) {
        mysqli_query($connection, "UPDATE `todos` SET `stutas` = 1 WHERE `id_todos` = $todosId");
    }elseif($data['stutas'] == 1){
        mysqli_query($connection, "UPDATE `todos` SET `stutas` = 0 WHERE `id_todos` = $todosId");
    }
    return mysqli_affected_rows($connection);
}
// ***************************************************
// ..........[delete the task ].............by id_todos
function deleteToDo($todosId)
{
    $connection = connection();
    mysqli_query($connection, "DELETE FROM `todos` WHERE `id_todos` = $todosId");
    return mysqli_affected_rows($connection);
}
// ***************************************************
// ..........[update the task ].............by id_todos

function gettodobyid($idTodo){
    $connection = connection();
    $res = mysqli_query($connection, "SELECT * FROM `todos` WHERE `id_todos` = $idTodo");
    return mysqli_fetch_assoc($res); 
}
function updatetodosby($task, $body, $img, $idTodo){

    $task = "`task` = '$task ' ";
    $body = ", `body` = '$body' ";
    $idTodo = " `id_todos` = '$idTodo'";
    if(!empty($img)){ 
        $img=",`img`='$img' "; 
    }elseif(empty($img)){
        $img = "";
    }
    $connection = connection();
    mysqli_query($connection ,"UPDATE `todos` SET $task $body $img WHERE $idTodo");
    return mysqli_affected_rows($connection);
}


?>