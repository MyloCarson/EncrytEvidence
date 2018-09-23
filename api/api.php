<?php
session_start();
include 'connect.php';

require '../vendor/autoload.php';

	
	function deleteEvidence($id){
		global $conn;
		// var_dump($conn);
		$sql = "DELETE FROM evidence where id = $id";
		$result = $conn->query($sql);
		$msg;
		if ($result === True) {
			$msg = array('error' => 0,'message' => 'Deleted Successfully');
			echo json_encode($msg);
			
		}else{
			$msg = array('error' => 1,'message' => 'Failed to Delete');
			echo json_encode($msg);
		}

	};

	function sendEmail($id){
		global $conn;

		$message = $_POST["message"];
		$sender = $_POST["sender"];
		$recipient = $_POST["recipient"];
		$subject = "Evidence";
		$msg;

		$sql =  "SELECT * FROM evidence WHERE id = $id";

		if ($res = $conn->query($sql)) {
			
			$mail = new PHPMailer;
			while($row=$res->fetch_assoc()) {
				try {
		    
					//Recipients
					$mail->setFrom($sender, 'Sender');
				    $mail->addAddress($recipient, 'User');     // Add a recipient
				    // $mail->addAddress('akannidavidseun@gmail.com');               // Name is optional
				    $mail->addReplyTo('info@example.com', 'Information');
				    // $mail->addCC('cc@example.com');
				    // $mail->addBCC('bcc@example.com');
				    $mail->Subject = 'Encrypted Zipped Evidence From EncryptWeb';
		    		$mail->Body    = $message."\n Here is the password ". $row['evidence_key'];
		    		$mail->addAttachment('../uploads/'.$row['filename'].'.zip');   
		    		$mail->SMTPDebug = false;
		            $mail->do_debug = 0;


				    ob_start(); //start output buffering to capture all output and prevent errors from being displayed
		            $delivery = $mail->Send();
		            ob_end_clean(); //erase the buffer and stop output buffering
				    $msg = array('error' => 0,'message' => 'Mail sent Successfully','sender'=>$sender, 'recepient_mail'=>$recipient);
					echo json_encode($msg);

					// $res = mail($recipient,$subject,$message);
					// if ($res != False) {
						
					// }else{
					// 	$msg = array('error' => 1,'message' => 'Mail not sent');
					// 	echo json_encode($msg);
					// }
				} catch (Exception $e) {
					    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;

					}
			}   
		
		}



		

	};

	function updateAccount($id){
		global $conn;
		$name = $_POST["name"];
		$username = $_POST["username"];

		$sql = "UPDATE `users` SET `fullname` = '$name',`username` = '$username' WHERE `id` = $id ";
		

		$res  = $conn->query($sql);

		if ($res) {
			$_SESSION["username"] = $username;
			$_SESSION["fullname"] = $name;
			$msg = array('error' => 0,'message' => 'Updated Successfully');
			echo json_encode($msg);
			
		}else{
			$msg = array('error' => 1,'message' => 'Failed to Update Account');
			echo json_encode($msg);
		}


	};
	
	

	$messageArray;
	if (isset($_POST["action"])) {
		switch ($_POST["action"]) {
			case 'delete':
				$id = $_POST["deleteID"];
				deleteEvidence($id);
				break;
			case 'email':
				if (isset($_POST["evidenceID"])) {
					$id = $_POST["evidenceID"];
					sendEmail($id);
				}

				break;
			case 'test':
			    testMail();
			    break;
			case 'update':
				if (isset($_POST["user_id"])) {
					$id = $_POST["user_id"];
					updateAccount($id);
				}

				break;
			
			default:
				# code...
				break;
		}
		

	}

	
?>