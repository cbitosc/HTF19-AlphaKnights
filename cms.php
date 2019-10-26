<?php
session_start();
$errorMsg = "";
$name=$_POST["username"];
$pwd=$_POST["password"];
$_SESSION["name"]=$name;
$conn=new mysqli("localhost", "root", "", "cms");
if($conn->connect_error)
{
    die("connection failed".$conn->connect_error);
}
else{
if($name == "indu" && $pwd == "indu" || $name == "swathi" && $pwd == "swathi" || $name == "shiva" && $pwd == "shiva" || $name == "parul" && $pwd == "parul"){
    //$sql=mysqli_query($conn,"select club_id from club_head where username==$name");
    //$cid=0;
    //while($row = mysqli_fetch_array($sql))
    //{
        header("Location: event.html");
    //}
        
}
else {
    echo "Invalid clubhead";
   //header("Location: /login-success.php"); die();
}}
?>
