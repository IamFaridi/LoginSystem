<?php
    $userexist=false;
    $usernotexist=false;
    
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        
        include 'components/_dbconnect.php';
        $username=$_POST['username'];
        $password=$_POST['password'];
        
        $sql="SELECT * FROM `user` WHERE `username` LIKE '$username' AND `password` LIKE '$password'";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        if ($num==1) {
            $userexist=true;
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['username']=$username;
            header("location: welcome.php");
        } else {

            $usernotexist=true;
        }
        
      
    }

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Sign In!</title>
  </head>
  <body>
    <?php require 'components/_nav.php' ?>
    <?php
    
        if ($userexist) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                      <strong>Success!</strong> You're Logged in.
                         <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                     </button>
                  </div>";
        }
        if ($usernotexist) {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                      <strong>Failed!</strong> User doesn't exist. <a href='signup.php'>Create account first</a>.
                         <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                     </button>
                  </div>";
        }

    ?>
    <div class="container my-4">
    <h1>Signin to our<strong> Website</strong></h1>
    <div class="container my-3">
    <?php require 'components/_signinform.php' ?>
    </div>
    </div>
