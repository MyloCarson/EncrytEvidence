<?php 
	$user = 'root';
	$pass = '';
	$db = 'encrypt_web';

	// $user = "id5628980_mylo";
	// $pass = "mylocarson101";
	// $db = "id5628980_encrypt_web";

	$conn = new mysqli('localhost', $user, $pass, $db) or die("unable to connect");
	// var_dump($conn);
	//check connection
	if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}
?>