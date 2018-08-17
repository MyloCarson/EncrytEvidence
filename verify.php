<?php
require 'connect.php';
session_start();
if (isset($_GET['email'])&&!empty($_GET['email'] AND isset($_GET['HASH'])&& !empty($_GET['hash']))){
    $email=mysqli_real_escape_string($conn,($_POST['email']));
    $verification_code=mysqli_real_escape_string($conn,($_POST['verification_code']));

    $query="SELECT * FROM users WHERE email='$email' AND verification_code='$verifiication_code' AND active='0' ";
     $result=mysqli_query($conn,$query);
     if(mysqli_num_rows($result)==0){
         echo 'Account has already been activated or URL is invalid';
     }
     else{
         echo 'Your account has been activated';
         $query="UPDATE users SET active = '1' WHERE email='$email'" or die('Activation failed');
         $result=mysqli_query($conn,$query);
         header("location: login.php");
     }
}
?>