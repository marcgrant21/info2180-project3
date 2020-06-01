<?php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'test';

$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$pass=$_POST['password'];
$email=$_POST['email'];
$tele=$_POST['telephone'];
$date=date('M d,Y');
try {
// Create connection
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO User (firstname, lastname, password, telephone, email, data_joined) VALUES ('$fname', '$lname','$pass',$tele, '$email', '$date' )";
$conn->exec($sql);
  echo "New record created successfully";
  }
  catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

  $conn = null;
  ?>