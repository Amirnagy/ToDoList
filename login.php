<?php
session_start();
include "lib/user.php";

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $result = checkUserLogin($email,$password);
    if(!empty($result)){
        $_SESSION['login'] = $result;
        header("location: index.php");
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <form action="login.php" method="post">
        <table>
            <tr>
                <td><label for="name"> email: </label></td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td><label for="password">password :</label></td>
                <td><input type="password" id="password" name="password"></td>
            </tr>
            <tr>
                <td>
                    <button type="submit">login</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>