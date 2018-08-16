<?php
require 'connect.php';
require 'functions.php';
if(isset($_POST['signup']))
 {
    $username=mysqli_real_escape_string($conn,($_POST['username']));
    $email=mysqli_real_escape_string($conn,($_POST['email']));
    $fullname=mysqli_real_escape_string($conn,($_POST['fullname']));
    signup($username,$email,$fullname,$password,$confirm_password);
}
?>

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Security Encryption</h1>
            <h1 class="lead"> we can devliver your encrypted evidences.</h1>
        </div>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form method='POST' action="index.php">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="username" type="text" class="form-control" name="username" placeholder="Username">
                
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="password" type="text" class="form-control" name="password" placeholder="password">
                
            </div>
            <button class="btn btn-primary col-md-12" name='login' >Login</button>
            
        </form>
        <div>
            <button class="btn btn-primary col-md-6" data-toggle="modal" data-target="#myModal">Register</button>
            <button class="btn btn-primary col-md-6" data-toggle="modal" data-target="#forgetModal">Forgot Password</button>
        </div>
    </div>
    
    <div class="col-md-4"></div>
    
</div>
<!-- Register Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Register | Create Account</h4>
      </div>
      <div class="modal-body">
        <div>

            <form action='index.php' method='POST'>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="username" type="text" class="form-control" name="username" placeholder="Username" required="true">
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input id="email" type="email" class="form-control" name="email" placeholder="someone@example.com" required="true">
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="fullName" type="text" class="form-control" name="fullName" placeholder="John Doe">
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="text" class="form-control" name="password" placeholder="password" required="true">
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="confirm-password" type="text" class="form-control" name="confirm-password" placeholder="password" required="true">
                </div>
                <button class="btn btn-primary" name='register'>Create Account</button>
            </form>
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- end of register modal-->

<!-- Forgot passwordModal -->
<div id="forgetModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reset Password </h4>
      </div>
      <div class="modal-body">
        <form>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input type="email" name="email" placeholder="someone@example.com" class="form-control" />
                
            </div>
            <button class="btn btn-primary">Reset</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    
    
</body>
</html>