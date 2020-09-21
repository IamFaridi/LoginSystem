<?php
    $inserted=false;
    $passnotmatch=false;
    $repeat=false;

    if ($_SERVER['REQUEST_METHOD']=="POST") {
        
        include 'components/_dbconnect.php';
        $username=$_POST['username'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];

        $existSql="SELECT * FROM `user` WHERE `username` = '$username'";
        $result=mysqli_query($conn,$existSql);
        $num=mysqli_num_rows($result);
        if ($num>0) {
            $repeat=true;
        } else {

        if (($password==$cpassword)) {
          $hash= password_hash($password,PASSWORD_DEFAULT);
        $sql="INSERT INTO `user` (`username`, `password`, `time`) VALUES ('$username', '$hash', current_timestamp());";
        $result=mysqli_query($conn,$sql);
        if ($result) {
            $inserted=true;
         }
      }else {
          $passnotmatch=true;
      }
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

    <title>Sign Up!</title>
  </head>
  <body>
    <?php require 'components/_nav.php' ?>
    <?php
    
        if ($inserted) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                      <strong>Success!</strong> Account has been created. Please proceed to <a href='signin.php'> Signin page</a>.
                         <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                     </button>
                  </div>";
        }
        if ($passnotmatch) {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                      <strong>Failed!</strong> Password doesn't match. Please try again.
                         <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                     </button>
                  </div>";
        }
        
        if ($repeat) {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                      <strong>Failed!</strong> Username has already been taken.
                         <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                     </button>
                  </div>";
        }
    ?>
    <div class="container my-4">
    <h1>Signup to our<strong> Website</strong></h1>
    <div class="container my-3">
    <?php require 'components/_signupform.php' ?>
    </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>