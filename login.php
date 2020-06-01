<?php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'test';


$email=$_POST['email'];
$pass=$_POST['password'];

$conn = mysqli_connect($host, $username, $password, $dbname);
	$result = mysqli_query($conn,"SELECT * FROM User WHERE email = '$email' AND password = '$pass'");
	$count  = mysqli_num_rows($result);
	$set = mysqli_fetch_array($result);
	if($count==0) {
		$message = "Invalid Username or Password!";
		echo $message;
		header("Location: index.html");

	}else {
		$message = "You are successfully authenticated!";
		echo $message;
		echo $message;
		session_start();
		
		$go = $set['id'];
		$_SESSION['userid']= $go;
		
		header("Location: homescreen.php");

	}
?>

