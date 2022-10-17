<?php
session_start();
if(empty($_SESSION['login'])){
    header("location: login.php");
}

include "lib/todo.php";

include "lib/privilege.php";
$column_of_todos = readtoDobyuser_id($_SESSION['login']['id']);

$pre = $_SESSION['login']['privilege'];
// var_dump($pre);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view</title>
</head>
<body>
    <table border="1px">
        <tr>
            <th>#</th>
            <th>task</th>
            <th>body</th>
            <th>img</th>

            <?php if ($pre == 0){ ?>

                <th>done</th>
                <th>edit</th>
                <th>delete</th>

            <?php } ?>
        </tr>
        <?php foreach($column_of_todos as $todo): ?>
            <?php if ($todo['stutas'] == 1):?>
            <tr style="background-color:red;" >
            <?php else:?>
            <tr>
            <?php endif; ?>
                <td><?php echo $todo['user_id'] ?></td>
                <td><?php echo $todo['task'] ?></td>
                <td><?php echo $todo['body'] ?></td>
                <td><img width="100px" height="100px" src="upload/<?php echo $todo['img'] ?>"></td>


                <?php if ($pre == 0){ ?>


                    <td><a href="todo/donetodo.php?id=<?= $todo['id_todos'];?>">done</a></td>
                    <td><a href="todo/updatetodo.php?id=<?= $todo['id_todos'];?>">edit</a></td>
                    <td><a href="todo/deletetodo.php?id=<?= $todo['id_todos'];?>">delete</a></td>


                <?php } ?>
            </tr>
            
        <?php endforeach; ?>
    </table>
</body>
</html>
