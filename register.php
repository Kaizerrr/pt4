<?php 
require_once('connect.php');
if(isset($_POST['submit'])){
    $fn = $_POST['firstname'];
    $ln = $_POST['lastname'];
    $bday = $_POST['birthday'];
    $email = $_POST['email'];
    $add = $_POST['address'];
    $pwd = $_POST['password'];

    if($fn ==''){
        echo "<script>alert('First name cannot be blank...')</script>";
        include('register.html');
        exit;
    }
    else if($ln ==''){ 
        echo"<script>alert('Last name cannot be blank...')</script>";
        include('register.html');
        exit;
    }


    $query = "INSERT INTO users_tbl(first_name, last_name, birthdate, email, address, pass, reg_date)
     VALUES('$fn', '$ln', '$bday', '$email', '$add', '$pwd',NOW())";
    $result = @mysqli_query($dbc, $query);
    if (!$result){
        $err[] = "Fail to add user: " . mysqli_error($dbc);
    }
    else{ 
        echo 'One record successfully added to database...';
        include('login.html');
    }
    mysqli_close($dbc);

}
    else{ 
        exit('Could not connect to database'.mysqli_connect_error());
    }

?>