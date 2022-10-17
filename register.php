<?php
include "lib/user.php";
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $resul = insertUser($name,$email,$password);
    if($resul == 1){
        header("location: login.php"); 
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>
<body>
    <form action="register.php" method="post">
        <table>
            <tr>
                <td> 
                    <label for="name">name:</label>
                </td>
                <td>
                    <input type="text"  name="name" id="name">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name">email:</label>
                </td>
                <td>
                    <input type="email" name="email" id="email">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name">password:</label>
                </td>
                <td>
                    <input type="password" name="password" id="password">
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit">send </button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>