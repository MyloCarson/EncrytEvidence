<?php

	$user = 'root';
	$pass = '';
	$db = 'encrypt_web';
	$conn =  mysqli_connect('localhost', $user, $pass,$db) or die("unable to connect");
	//check connection

	if (!$conn) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>