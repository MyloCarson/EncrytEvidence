<?php
	$user = 'root';
	$pass = '';
	$db = 'encrypt_web';

	$conn = new mysqli('localhost', $user, $pass, $db) or die("unable to connect");
	//check connection
	echo 'hey';
	if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}
?>