<?php
    session_start();

    include '../../connect.php';
    
    $FPEmail = $_POST['FPEmail'];
    // $phoneNo2 = $_POST['phoneNo2'];      
    $forgotpass = $_POST['forgotpass'];
    $verifycode = $_POST['verifycode'];
    $verify = $_POST['verify'];
    
    if($forgotpass == "success"){
    
    $stmt = $conn->prepare('SELECT resEmail FROM rgera_table WHERE resEmail = ?');
    $stmt->bind_param('s', $FPEmail);
    
    $stmt->execute();
    
    $result = $stmt->get_result();
    $arr = $result->fetch_assoc();
    if($arr > 0){
        $_SESSION['verify_mail'] = $FPEmail;
        $message = substr(md5(uniqid(rand(), true)), -8, 8);
            $sql2 = "UPDATE `rgera_table` SET `emailVerify`='$message' WHERE `resEmail`='$FPEmail'";
            $result2 = $conn->query($sql2);
            if($result2 === TRUE){
                if(mail($FPEmail,"Royal Gardens Estate Forgot Password Verification Code",$message)){
                echo "Message has been sent. Check your mail for a verification code!";
                }else{
                    echo "message could not be sent";
                }

//                 require '../../PHPMailer_master/PHPMailerAutoload.php';
//                 // require '/home/rgeraorg/public_html/rgeraHouse.org/public_html/public_html/PHPMailer_master';

// $mail = new PHPMailer;

// //$mail->SMTPDebug = 3;                               // Enable verbose debug output

// $mail->isSMTP();                                      // Set mailer to use SMTP
// $mail->Host = "mail.rgera.org"; 
// $mail->SMTPAuth = true;                               // Enable SMTP 
// $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
// $mail->Port = 465;                                    // TCP port to connect to
// $mail->Username = "admin@rgera.org";
// $mail->Password = "Ba093mSah7";
// $mail->setFrom('admin@rgera.org', 'Royal Gardens Residents Association');
// $mail->addAddress($FPEmail);               // Name is optional

// $mail->Subject = 'Forgot Password Verification Code';
// $mail->Body    = $message;
// $mail->AltBody = $message;

// if(!$mail->send()) {
//     echo 'Message could not be sent.'.$mail->ErrorInfo;
//     // echo 'Mailer Error: ' . $mail->ErrorInfo;
// }
// else {
//     echo 'Message has been sent. Check your mail for a verification code!';
// }
            // }
            
    }else{
        echo "Please, your entries don't match what is in our records!";
    }
    }
}
    if($verify == "success" && isset($_SESSION['verify_mail'])){
        $user_email = $_SESSION['verify_mail'];
         $sql3 = "SELECT * FROM `rgera_table` WHERE `emailVerify`='$verifycode' AND resEmail = '$user_email'";
         $result3 = $conn->query($sql3);
         $numresult3 = mysqli_num_rows($result3);
         if($numresult3>0){
             $sql4 = "UPDATE `rgera_table` SET `emailVerify`= NULL WHERE `emailVerify`='$verifycode'";
             $result4 = $conn->query($sql4);
             if($result4 === TRUE){
                echo "You can now change your password!";
             }
         }else{
             echo "code is not correct!";
         }
    }
    
    
    
?>
 