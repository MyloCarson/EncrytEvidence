<?php
require 'functions.php';

$servername = "localhost";
$username = "root";
$password = "";
$db="encrpt_web";

$connection= mysqli_connect($servername,$username,$password);
if($connection){
    $username=mysqli_real_escape_string($connection,($_POST['username']));
    $email=mysqli_real_escape_string($connection,($_POST['email']));
    $fullname=mysqli_real_escape_string($connection,($_POST['fullname']));
    $password=$_POST['password'];
    $confirmPassword=$_POST['confirm-password'];
    $hashfunction="$2y$10$";
    $salt="iamencodeddecodeifyoucan";
    $hashf_salt=$hashfunction.$salt;
    $password=crypt($password,$hashf_salt);
    $confirmPassword=crypt($password,$hashf_salt);

    $validation_code = md5(rand(0,1000));
    echo $password;
}
else
die('Connection failed'.mysqli_error());






// checkValidEmail($email);
//confirm if email already exists
// $result=$mysqli->query("SELECT * FROM users where email = '$email'") OR die($mysqli->error());
// if ($result->num_rows>0){
//     $message='User with email already exists';
//     echo $message;
//     //header(location:"error.php");
// }
// else {
//     if ($password==$confirmPassword&&checkValidEmail($email)){
// $sql="INSERT INTO users (username,fullname,password,email,verification_code)
// VALUE ('$username','$fullname','$password','$email','$validation_code')";
// $mysqli->query($sql);
// }

// }
?>