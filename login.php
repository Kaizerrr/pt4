<?php
require_once('connect.php');

if(isset($_POST['submit'])){ 
    $queryfire = '1';
    $username=$_POST['username'];
    $password = $_POST['password'];
    $login_query ="SELECT * from users_tbl WHERE email='$username' AND pass='$password' ";

    $result = mysqli_query($dbc, $login_query);

    if($queryfire && mysqli_num_rows($result)){
        echo "<script>alert('You are Successfully logged in');</script>";
        header("Location: view.php");
     
        $_SESSION ['email'] = $username;
    }
    
    else{ 
        echo "<script>alert('Email and Password is incorrect!')</script>";
        include("login.html");
        exit;
    }
    
}
 ?>

 