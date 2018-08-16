 <?php

 function checks($email,$password,$confirm_password){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)||$password!=$confirm_password)
        return false;
        else return true;
    }

    function validationCode()
    {
        $validation_code = md5(rand(0,1000));
        return $validation_code;

    }
    function passwordEncode($password){
        if(isset($_POST['password'])){
            $password=$_POST['password'];
            $hashfunction="$2y$10$";
        $salt="iamencodeddecodeifyoucan";
        $hashf_salt=$hashfunction.$salt;
        $password=crypt($password,$hashf_salt);
        return $password;
        }
    }
    function signup($username,$email,$fullname,$password,$confirm_password)
{
    if(checks($email,$password,$confirm_password)==true)
    {
        $password=passwordEncode($password);
        $verification_code=validationCode();
        $query="INSERT INTO users (username,fullname,email,password,verification_code,date_created)
        VALUES($username,$fullname,$email,$password,$verification_code,date('Y-m-d'))";
        $execute=mysqli_query($conn,$query);
        if($execute)
        {
            echo 'Signup successful';
        mail($email.'Validation Code','Thank you for signing up, your verification code is'.$verification_code);
        }      
             else 'Signup unsucccessful';
    }
            
}
    

?>