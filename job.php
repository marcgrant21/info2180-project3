<?php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'test';

$title=$_POST['Title'];
$descpri=$_POST['Description'];
$cat=$_POST['Category'];
$Cname=$_POST['Company'];
$locate=$_POST['Location'];
$date=date('M d,Y');

try {
// Create connection
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO Jobs (job_title, job_description, category, company_name, company_location, date_post) VALUES ('$title', '$descpri','$cat','$Cname', '$locate', '$date' )";
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