\=\<!DOCTYPE html

<html>
    <head>
        <title> Dashboard/ Homescreen </title>
        <link rel="stylesheet" href="styles/dashboard.css" type="text/css" />
    </head>
    <body>
     <div class="myGrid">
         <div class="topBox" >
            <h2 id="loginpage"> Hire Me </h2>
         </div>
        <div class="sideBox">
          <img src="img/home.jpg" id="home"> <a href="homescreen.html"> Home </a> </img> <br> <br>
          <img src="img/addon.jpg" id="Addon"> <a href="user.html"> Add User </a> </img> <br> <br>
          <img src="img/edit.jpg" id="Edit"> <a href="jobs.html"> New Job </a> </img> <br> <br>
          <img src="img/logout.jpg" id="Logout"> <a href="index.html"> Logout </a> </img> <br> <br>
        </div>
       <div class="centerBox">
               <h2> Dashboard  <a href="jobs.html"> <button id="colorIt"> Post a Job </button></a> </h2>
        
       
        <div class="firstTable">
           <h5> Available Jobs </h5>
           <?php
           $host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'info2180_schema';



               
                $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id,company_name, job_title, category, date_post FROM Jobs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table>";
     echo "<tr id=headr ><th>Company</th><th>Job Title</th><th>Category</th><th>Date</th></tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["company_name"]."</td>";
        echo "<td><a href= viewing.php?ID=".$row["id"].">".$row["job_title"]."</a></td>";
        echo "<td>".$row["category"]."</td>";
        echo "<td>".$row["date_post"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<table>";
      echo "<tr id=headr ><th>Company</th><th>Job Title</th><th>Category</th><th>Date</th></tr>";
     echo "</table>";
}
$conn->close();
?>
           
        </div>
        
        <div class="secondTable"> 
            <h5> Jobs Applied For </h5>
             <?php
           $host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'test';

session_start();
$user_id=$_SESSION['userid'];
               
                $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM Jobs INNER JOIN Jobs_Applied_For on Jobs.id = Jobs_Applied_For.job_id INNER JOIN User on Jobs_Applied_For.user_id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table>";
     echo "<tr id=headr ><th>Company</th><th>Job Title</th><th>Category</th><th>Date</th></tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["company_name"]."</td>";
        echo "<td><a href= viewing.php?ID=".$row["id"].">".$row["job_title"]."</a></td>";
        echo "<td>".$row["category"]."</td>";
        echo "<td>".$row["date_post"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<table>";
      echo "<tr id=headr ><th>Company</th><th>Job Title</th><th>Category</th><th>Date</th></tr>";
     echo "</table>";
}
$conn->close();
?>
            
        </div>
       </div>
     </div>   
    </body>
    
</html>