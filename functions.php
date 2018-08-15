 <?php
 
 $servername = "localhost";
$username = "root";
$password = "";
$db="encrpt_web";
//establish connection
$connection= mysqli_connect($servername,$username,$password);
 function checkValidEmail($email){
    if(filter_var($email,FILTER_VALIDATE_EMAIL))
        return true;
        else 
        {
            $message='Invalid Email Format';
            echo $message;
            return false;
        }
    }

    function passwordEncrpt($password){
        $salt="iamencodeddecodeifyoucan";
        $hashf_salt=$hashfunction.$salt;
        $password=crypt($password,$hashf_salt);
        return $password;
    }

    function confirmPassword ($password,$confirmPassword){
        if (($password!=$confirmPassword)){
            $response= 'Passwords do not match';
            echo $response;
                }

    }
    function validationCode(){
        $validation_code = md5(rand(0,1000));
        

    }
?>