<?php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'test';
session_start();
$job_id= $_GET["id"];
$user_id=$_SESSION['userid'];
$date=date('M d,Y');

try {
// Create connection
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO Jobs_Applied_For (job_id, user_id, date_applied) VALUES ('$job_id', '$user_id','$date' )";
$conn->exec($sql);
  echo "New record created successfully";
 
  header("Location: homescreen.php");
  }
  catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

  $conn = null;
  ?>