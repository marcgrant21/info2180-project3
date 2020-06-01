<! DOCTYPE html>

<html>
    <head>
        <title> Dashboard/ Homescreen </title>
        <link rel="stylesheet" href="styles/viewing.css" type="text/css" />
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
          <img src="img/logout.jpg" id="Logout"> <a href="index.html"> Logout </a> </img> <br>
        </div>
        <div class="centerBox">
<?php
    $host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'test';


               
                $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$gid = $_GET["ID"];
$sql = "SELECT * FROM Jobs WHERE id LIKE '%$gid%' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div><div id='growIt'>".$row["job_title"]."</div>";
        echo "<a href=save_offer.php?id=".$row["id"]."><button id='colorIt'> Apply Now </button></a><br>";
        echo "Post ".$row["date_post"]."<br>";
        echo $row["category"]."</div><br/><br>";
        echo "<div>".$row["company_name"]."<br>";
        echo $row["company_location"]."</div><br><br>";
        echo "<div><h4> Job Description </h4>";
        echo $row["job_description"] ."</div><br>";
        

    }
} else {
    echo "no job was selected";
}
$conn->close();
?>

 </div>
    </div>   
    </body>
</html>