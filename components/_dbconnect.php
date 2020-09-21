<?php
    $server="localhost";
    $username="root";
    $password="";
    $database="user1996";

    $conn=mysqli_connect($server,$username,$password,$database);
    
    if (!$conn) {
        echo mysqli_connect_error();
    }
?>