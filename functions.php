 <?php
session_start();
require 'connect.php';
 function checks($email,$password,$confirm_password){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)||$password!=$confirm_password)
      
        return false; 
        else 
       return true;
    }

    
    function validationCode()
    {
        $validation_code = md5(rand(0,1000));
        return $validation_code;

    }
    function passwordEncode($password){
        $hashfunction="$2y$10$";
        $salt="iamencodeddecodeifyoucan";
        $hashf_salt=$hashfunction.$salt;
        $password=crypt($password,$hashf_salt);
        return $password;
        }
    
    function signup($username,$email,$fullname,$password,$confirm_password)
{
   
    global $conn;
    $query="SELECT * FROM `users` WHERE Email ='$email'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
       echo 'User with Email '.$email.' already exists';
    }
    elseif(checks($email,$password,$confirm_password))
    {
        $password=passwordEncode($password);
        $verification_code=validationCode();
        $query="INSERT INTO users (username,fullname,email,password,verification_code,date_created)
        VALUES('$username','$fullname','$email','$password','$verification_code',now())";
        if(mysqli_query($conn,$query))
        {
            echo 'Signup successful';
            $_SESSION['active']=0;
            $_SESSION['logged-in']=True;
            $message="
            Confirmation link has been sent to $email, 
            please verify your account by clicking on the link in the message";
            $to = $email;
            $subject = 'Account Verification (Evidence)';
            $message_body = "Hello $username, 
            Thanks for signing up!
            Please Click this link to activate your account:
            http://localhost/Evidence/Evidence/profile.php?email=$email, &verification_code = $verification_code";
            echo $message;
            mail($to, $subject,$message_body);
        }  
        
     }   
            
     else echo 'Signup failed, check email and ensure passwords match'; 
}
function login($email,$password){
    $password=passwordEncode($password);
    global $conn;
    $query="SELECT * FROM `users` WHERE Email ='$email'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==0){
       echo 'User with Email '.$email.' do not exist';
    }
else{
    $user=mysqli_fetch_assoc($result);
    if($password==$user['password']){
        echo 'login success';
        header("location:profile.php");
    }
    else 
    echo 'Invalid password';
}

}
?>