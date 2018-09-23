<?php
	session_start();

	if (!isset($_SESSION["user_id"])) {
		header("location:index.php");
	}else{
		$userID = $_SESSION["user_id"];
	}
?>
<!DOCTYPE html>
<?php 
 include 'api/connect.php';

?>
<html>
<head>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>File Encryption</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/main.css" />
    <script src="assets/js/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/themes/bootstrap.min.css">
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <!-- JavaScript -->
    <script src="assets/js/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="assets/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="assets/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/bootstrap.min.css"/>
    <script src="main.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="jumbotron jumbotron-fluid">
        	<div class="container">
            	<h1 class="display-4">Security Encryption</h1>
            	<h1 class="lead"> we can devliver your encrypted evidences.</h1>
        	</div>
    	</div>
		<div class="row">
			<div class="col-md-3">
				<center><img src="img/usericon.png" class="img-rounded" height="100" /></center>
				<div>
					<center><h3><?php echo $_SESSION["username"]; ?></h3></center>
					<center><button class="btn btn-primary"><a href="logout.php" style="color: white;text-decoration: none;">Log Out</a></button></center>

					<center><button class="btn btn-primary" data-toggle="modal" data-target="#editModal">Edit Account</button></center>
					<center><button class="btn btn-primary">Delete Account</button></center>
					<center><button class=" btn btn-primary">Reset Password</button></center>
				</div>
 			</div>
			<div class="col-md-8">
				<button class="btn btn-primary" data-toggle="modal" data-target="#newEvidenceModal">Upload New Evidence</button>



				<?php

					$sql = "SELECT * FROM `evidence` where `user_id` = $userID";
					
					if ($result = $conn->query($sql)) {
						if ($result->num_rows > 0 ) {
						$i=1;
                        while($row=$result->fetch_assoc()) {
                        	$password = '"'.$row["evidence_key"].'"';

                        	$output = "
                        				<div class='panel panel-default'>
							  <div class='panel-heading'>#".$i."    ".$row["filename"]."</div>
							  <div class='panel-body'>Evidence Details
								<div class='row'>
									<div class='col-md-10'>
										<h6>Filename : ".$row["filename"].".zip</h6>
										<h6>Date Added : ".date("m-d-Y", strtotime($row["date_created"]))."</h6>

										<h6>Time Added : ".date("h:i  A", strtotime($row["date_created"]))."</h6>

									</div>
									<div class='col-md-2'>
										<button class='btn btn-primary' data-toggle='modal' data-target='#sendModal' onclick='send(".$row["id"].")'>Send</button>
										<button class='btn btn-primary' data-toggle='modal' data-target='#deleteModal' onclick='getDelete(".$row["id"].")'>Delete</button>
										<button class='btn btn-primary' data-toggle='modal' data-target='#keyModal' onclick='getMoreKey(".$password.")'>Get Key</button>
									</div>
								</div>
							  </div>
							</div>";
							$i++;
							echo $output;
	                        }
						}else{
							echo "<center><h1>No Evidence Uploaded</h1></center>";
						}

					}else{
						echo "<center><h1>No Evidence Uploaded</h1></center>";

					}

				?>


				<!-- <div class="panel panel-default">
				  <div class="panel-heading">First File Uploaded</div>
				  <div class="panel-body">Panel Content
					<div class="row">
						<div class="col-md-10">
							<h6>Filename : filename.zip</h6>
							<h6>Date Added : 10th August 2018</h6>

							<h6>Time Added : 10:00am</h6>

						</div>
						<div class="col-md-2">
							<button class="btn btn-primary">Send</button>
							<button class="btn btn-primary">Delete</button>
							<button class="btn btn-primary" data-toggle="modal" data-target="#keyModal">Get Key</button>
						</div>
					</div>
				  </div>
				</div>

				<div class="panel panel-default">
				  <div class="panel-heading">First File Uploaded</div>
				  <div class="panel-body">Panel Content
					<div class="row">
						<div class="col-md-10">
							<h6>Filename : filename.zip</h6>
							<h6>Date Added : 10th August 2018</h6>

							<h6>Time Added : 10:00am</h6>

						</div>
						<div class="col-md-2">
							<button class="btn btn-primary">Send</button>
							<button class="btn btn-primary">Delete</button>
							<button class="btn btn-primary" data-toggle="modal" data-target="#keyModal">Get Key</button>

						</div>
					</div>
				  </div>
				</div>

				<div class="panel panel-default">
				  <div class="panel-heading">First File Uploaded</div>
				  <div class="panel-body">Panel Content
					<div class="row">
						<div class="col-md-10">
							<h6>Filename : filename.zip</h6>
							<h6>Date Added : 10th August 2018</h6>

							<h6>Time Added : 10:00am</h6>

						</div>
						<div class="col-md-2">
							<button class="btn btn-primary">Send</button>
							<button class="btn btn-primary">Delete</button>
							<button class="btn btn-primary" data-toggle="modal" data-target="#keyModal">Get Key</button>

						</div>
					</div>

				  </div>
				</div> -->

			</div>
		</div>
		
	</div>


	<!-- upload Modal -->
	<div id="newEvidenceModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Add New Evidence </h4><span class="glyphicons glyphicons-plus"></span>
	      </div>
	      <div class="modal-body">
	      	<form enctype="multipart/form-data" method="POST" action="">
	      		<div class="form-group">
				  <label for="title">Folder Name:</label>
				  <input type="text" name="folder_name" class="form-control" id="title" placeholder="Evidence One" required="true">
				</div>

				<div class="form-group">
				  <label for="title">About Evidence:</label>
				  <textarea class="form-control" name="about" placeholder="Write something explanatory about the evidence"></textarea> 
				</div>

	      		<input type="file" name="file[]" class="input-control" multiple required="true">
	      		<!-- <span class="help-block">Only .zip and .rar files are allowed.</span> -->
	      		<div class="alert alert-danger">
	      			<strong>Add all files for evidence</strong>
	      			
	      		</div>

	      		<button type="submit"  name="upload" class="btn btn-primary">Upload</button>
	      	</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div> 
	</div>
	<!-- End Of upload Modal-->
	<?php
		function randomPassword() {
			$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			$pass = array(); //remember to declare $pass as an array
			$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
			for ($i = 0; $i < 8; $i++) {
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
			}
		return implode($pass); //turn the array into a string
		}


		?>
	<?php 	
		if (isset($_POST['upload'])) {
			$directory = "uploads/";

			$folder_name = $_POST['folder_name'];
			$about = $_POST['about'];
			$password = randomPassword();
			$today = date("F j, Y, g:i a"); 
			$path = "mylo"; 

			$zip = new ZipArchive();
			if (isset($_FILES['file'])) {
				$zipFile = __DIR__ . '/uploads/'.$folder_name.'.zip'; //Specify the zip file

			    $zipStatus = $zip->open($zipFile, ZipArchive::CREATE);
			    
			    //Check if the zipped file has been created...

			    if ($zipStatus !== true) {
			        throw new RuntimeException(sprintf('Failed to create zip archive. (Status code: %s)', $zipStatus));
			    }

			    //Set the password of the folder

			    if (!$zip->setPassword($password)) {
			        throw new RuntimeException('Set password failed');
			    }

			    /**
			     * Move the files to a temporary location
			     * Add the files to the zip folder
			     */

			    for($i=0; $i < count($_FILES['file']['name']); $i++)
			    {   
			        move_uploaded_file($_FILES['file']['tmp_name'][$i], __DIR__.'/tempLocation/'.''.$_FILES['file']['name'][$i]);
			        $fileName = __DIR__.'/tempLocation/'.''.$_FILES['file']['name'][$i];
			        $baseName = basename($fileName);
			        if (!$zip->addFile($fileName, $baseName)) {
			            throw new RuntimeException(sprintf('Add file failed: %s', $fileName));
			        }
			        if (!$zip->setEncryptionName($baseName, ZipArchive::EM_AES_256)) {
			            throw new RuntimeException(sprintf('Set encryption failed: %s', $baseName));
			        }
			    }

		// location.reload();

			    $sql = "INSERT INTO `evidence` (`user_id`,`title`,`about`,`filename`,`path`,`evidence_key`,`date_created`) VALUES ((select id from users where id = $userID),'$folder_name','$about','$folder_name','$zipFile','$password','$today')";
			    // var_dump($sql);
			    $res = $conn->query($sql);
			    if ($res ==true) {
			    	echo "<script type='text/JavaScript'>
        
                                 window.onload = function(){ alertify.alert('Evidence has been uploaded successfully');
                                 	
                                 	window.location.href='https://testthesms.000webhostapp.com/encryptweb/profile.php';
                             };
                                 
                                 </script>";
			    }
			    else{
			    	echo "<script type='text/JavaScript'>
        
                                 window.onload = function(){ alertify.alert('Failed');};
                                 
                                 </script>";
			    }

			
				
			}
		}
	?>

	<!-- GetKey Modal -->
	<div id="keyModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Key for File Uploaded</h4>
	      </div>
	      <div class="modal-body">
	        <div class="well" id="passkey">X673HSBH!682YHSH</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
	<!-- end of key modal-->

	<!-- Delete Modal-->
	<div id="deleteModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Delete </h4>
	      </div>
	      <div class="modal-body">
	        <div class="well" id="passkey">Are you sure you want to delete ?</div>
			<div>
				<button class="btn btn-default" data-dismiss="modal">No</button>
				<button class="btn btn-primary" onclick="del()">Yes</button>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
	<!-- end of Delete Modal-->

	<!-- Send Modal-->
	<div id="sendModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Send Uploaded File</h4>
	      </div>
	      <div class="modal-body">
	        	<div class="form-group">
				  <label for="title">Sender's E-Mail:</label>
				  <input type="email" name="name" class="form-control" placeholder="sender@example.com" required="true" id="senderName">
				</div>

				<div class="form-group">
				  <label for="title">Recipient's Email:</label>
				  <input type="email" name="recepient_mail" class="form-control" placeholder="recipient@example.com" required="true" id="recipient_mail">
				</div>

				<div class="form-group">
				  <label for="title">Message</label>
				  <textarea class="form-control" placeholder="Hi, am sending this message" name="message" required="true" id="senderMessage"></textarea>
				</div>
				<button class="btn btn-default" type="submit" name="send" onclick="sendEmail()">Send</button>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
	<!-- end of send Modal-->
	
	<!--begin of edit account modal -->
	
	<div id="editModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Edit Account</h4>
	      </div>
	      <div class="modal-body">
	        	<div class="form-group">
				  <label for="title">Full Name</label>
				  <input type="text" name="name" class="form-control" placeholder="John Doe" required="true" id="name" value="<?php echo $_SESSION["fullname"]; ?>">
				</div>

				<div class="form-group">
				  <label for="title">Username</label>
				  <input type="email" name="username" class="form-control" placeholder="user5000" required="true" id="username" value="<?php echo $_SESSION["username"]; ?>">
				</div>

				<button class="btn btn-default" type="submit" name="send" onclick="updateAccount()">Send</button>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
		<input id="getMe" type="text" value="<?php echo $_SESSION["user_id"]; ?>" style="display: none;">
	  </div>
	</div>
	<!-- end of edit account Modal-->

	<script type="text/javascript">

	// $(window).load(function(){  function getMoreKey(){}   });

	$(document).ready(function() {
		 getMoreKey = function(key){
		 	console.log(key);
		 	$('#passkey').text(key);

		};
		let deleteId;
		getDelete = function(id){
			deleteId = id;
			console.log(deleteId);

		};

		del = function(){
			console.log(deleteId);
			$.ajax({
              type:"POST",
              url: "api/api.php",
              data:{
                action:"delete",
                deleteID : deleteId
              },
              success:function (data) {
                  // console.log("success deleting: "+ data);
                 let obj = JSON.parse(data);
                 console.log(obj.error);
                 console.log(obj.message);
                 if (obj.error == 0) {
                 	alertify
						  .alert(obj.message, function(){
						    alertify.message('OK');
						    location.reload();
						  });
                 	
                 }else{
                 	alertify
						  .alert(data, function(){
						    alertify.message('OK');
						  });
                 }
              },
              error:function () {
                alert("Error");
              }
            });
		};

		let sendID;

		send = function(id){
			sendID = id;
			console.log(id);
		};

		sendEmail = function(){
			let sender = $('#senderName').val();
			let recipient_mail = $('#recipient_mail').val();
			let senderMessage = $('#senderMessage').val();

			data = {
                action:"email",
                evidenceID : sendID,
                sender : sender,
                recipient : recipient_mail,
                message : senderMessage
              }
             console.log(data);


			$.ajax({
              type:"POST",
              url: "api/api.php",
              data:{
                action:"email",
                evidenceID : sendID,
                sender : sender,
                recipient : recipient_mail,
                message : senderMessage
              },
              success:function (data) {
                 console.log("success mail: "+ data);
                 let obj = JSON.parse(data);
                 console.log(obj);
                 console.log(obj.error);
                 console.log(obj.message);
                 if (obj.error == 0) {
                 	alertify
						  .alert(obj.message, function(){
						   alertify.message('OK');
						   location.reload();
						  });
                 	
                 }else{
                 	alertify
						  .alert(data, function(){
						   alertify.message('OK');
						  });
                 }
              },
              error:function () {
                alert("Error");
              }
            });
		};

		updateAccount = function(){
			let name = $("#name").val();
			let username = $("#username").val();
			let id = $("#getMe").val();


			data = {
                action:"update",
                user_id : id,
                name : name,
                username : username
              }
             console.log(data);


			$.ajax({
              type:"POST",
              url: "api/api.php",
              data:{
                action:"update",
                user_id : id,
                name : name,
                username : username
              },
              success:function (data) {
                 console.log("success mail: "+ data);
                 let obj = JSON.parse(data);
                 console.log(obj);
                 console.log(obj.error);
                 console.log(obj.message);
                 if (obj.error == 0) {
                 	alertify
						  .alert(obj.message, function(){
						   alertify.message('OK');
						   location.reload();
						  });
                 	
                 }else{
                 	alertify
						  .alert(obj.message, function(){
						   alertify.message('OK');
						  });
                 }
              },
              error:function () {
                alert("Error");
              }
            });


		};

   		
 });
	
</script>
</body>
</html>
