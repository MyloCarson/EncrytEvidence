 <?php
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
    echo 'i dey!';
    $query="SELECT * FROM `users` WHERE Email ='$email'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
       echo 'User with Email '.$email.' already exists';
    }
    elseif(checks($email,$password,$confirm_password))
    {
        $password=passwordEncode($password);
        $verification_code=validationCode();
        $query="INSERT INTO users (username,fullname,email,password,verification_code)
        VALUES('$username','$fullname','$email','$password','$verification_code')";
        if(mysqli_query($conn,$query))
        {
            echo 'Signup successful';
        ///mail($email.'Validation Code','Thank you for signing up, your verification code is'.$verification_code);
        }  
        
     }   
            
     else echo 'Signup failed, check email and ensure passwords match'; 
}
?>