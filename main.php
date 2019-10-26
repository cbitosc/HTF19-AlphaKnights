<?php
session_start();
//header("Location: event.html"); die();
//include 'event.html';
$name=$_SESSION["name"];
$e_name=$_POST["name"];
$e_des=$_POST["description"];
$e_date=$_POST["date"];
$e_time=$_POST["time"];
$conn=new mysqli("localhost", "root", "", "cms");

$sql1="select * from club_head where username='$name'";
$r1=$conn->query($sql1);
$cid=0;
while($i=$r1->fetch_assoc())
{
	$cid=$i['club_id'];
}
if($conn->connect_error)
{
    die("connection failed".$conn->connect_error);
}
$sql="INSERT INTO events(club_id,e_name,e_desc,e_date,e_time) VALUES('$cid','$e_name','$e_des','$e_date','$e_time')";
if(($r=$conn->query($sql))== false)
        echo $conn->error;
    
else
{
	echo"
	<html>	
	<head>
	<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
	</head>
	<body>
	<div class='container'>
	<div class='alert alert-success'>
  		<h1><strong>Event details updated successfully!</strong></h1>
	</div>
	<br>
	<br>
	<a href='event.html' >Add Another Event</a>
	<br>
	<br>
	<a href = 'index1.html'>Log out</a>
	<br>
	<br>
    <a href='start1.html'>Go back to homepage</a>
    </div>
    </body>
    </html>";
}
?>
