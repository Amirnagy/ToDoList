<?php 

include "connection.php";

function insertUser($name,$email,$password){
    $connection = connection();
    mysqli_query($connection,"INSERT INTO users (name, email, password ) VALUES ('$name', '$email','$password')");
    return mysqli_affected_rows($connection);

}


function checkUserLogin($email,$password){
    $connection = connection();
    $res = mysqli_query($connection,"SELECT * FROM users WHERE email = '$email' And password = '$password'");
    return mysqli_fetch_assoc($res);
}


?>