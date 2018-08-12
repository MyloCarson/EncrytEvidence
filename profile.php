<!DOCTYPE html>
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
					<center><h3>i_am_mylo</h3></center>
					<center><button class="btn btn-primary">Log Out</button></center>

					<center><button class="btn btn-primary">Edit Account</button></center>
					<center><button class="btn btn-primary">Delete Account</button></center>
					<center><button class=" btn btn-primary">Reset Password</button></center>
				</div>
 			</div>
			<div class="col-md-8">
				<button class="btn btn-primary" data-toggle="modal" data-target="#newEvidenceModal">Upload New Evidence</button>

				<center><h1>No Evidence Uploaded</h1></center>

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
				  <label for="title">Title:</label>
				  <input type="text" name="title" class="form-control" id="title" placeholder="Evidence One">
				</div>

				<div class="form-group">
				  <label for="title">About Evidence:</label>
				  <textarea class="form-control" name="about" placeholder="Write something explanatory about the evidence"></textarea> 
				</div>

	      		<input type="file" name="file" class="input-control" accept=".zip, .rar">
	      		<!-- <span class="help-block">Only .zip and .rar files are allowed.</span> -->
	      		<div class="alert alert-danger">
	      			<strong>Note! only .zip and .rar is allowed.</strong>
	      			
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
		if (isset($_POST['upload'])) {
			$directory = "uploads/";

			$evidence_title = $_POST['title'];
			$about = $_POST['about'];
			if (isset($_FILES['file'])) {
				$filename = $_FILES['file']['name'];
				$file_tmp = $_FILES['file']['tmp_name'];
				move_uploaded_file($file_tmp,$directory.$filename);

				$zip = new ZipArchive();

				$zipFile = __DIR__ . '/output.zip';
				if (file_exists($zipFile)) {
				    unlink($zipFile);
				}

				$zipStatus = $zip->open($zipFile, ZipArchive::CREATE);
				if ($zipStatus !== true) {
				    throw new RuntimeException(sprintf('Failed to create zip archive. (Status code: %s)', $zipStatus));
				}

				$password = 'top-secret';
				if (!$zip->setPassword($password)) {
				    throw new RuntimeException('Set password failed');
				}

				// compress file
				$fileName = __DIR__ ."/".$directory.$filename;
				$baseName = basename($fileName);
				if (!$zip->addFile($fileName, $baseName)) {
				    throw new RuntimeException(sprintf('Add file failed: %s', $fileName));
				}

				// encrypt the file with AES-256
				if (!$zip->setEncryptionName($baseName, ZipArchive::EM_AES_256)) {
				     throw new RuntimeException(sprintf('Set encryption failed: %s', $baseName));
				}

				$zip->close();

			
				echo "<script type='text/JavaScript'>
        
                                 window.onload = function(){ alertify.alert('Evidence has been uploaded successfully');};
                                 
                                 </script>";
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
	        <div class="well">X673HSBH!682YHSH</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
	<!-- end of key modal-->

</body>
</html>