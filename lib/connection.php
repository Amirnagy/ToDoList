<?php

function connection(){
    $connection = mysqli_connect("localhost","root","","workshop");
    return $connection;
}

?>