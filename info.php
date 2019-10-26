<?php
session_start();
$conn=new mysqli("localhost", "root", "", "cms");
if($conn->connect_error)
{
    die("connection failed".$conn->connect_error);
}
else{
  $c_name=$_POST['btn'];
$sql="select e_name, e_desc, e_date, e_time from events where club_id=(select club_id from clubs where club_name='$c_name');";
if(($r=$conn->query($sql))== false)
        echo $conn->error;
else
{
      $res = mysqli_query($conn, $sql);
      if(mysqli_num_rows($res)==0)
      {
        echo "
        <html>
      <head>
      <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
      </head>
      <body>
      <div class='container'>
        <div class='jumbotron'>
        <h2 style='color:red; text-align:center;'><strong>No upcoming events!!</strong></h2>
      </div>
      </div>
      </body>
      </html>";
      }
      else
      {
      echo"<html>
      <head>
      <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
      </head>
      <body>
      <div class='container'>
       <table class='table table-dark' align='center' width='1200px' height = '300px' cellspacing='' cellpadding='0' border = 1>
       <thead>
              <tr>
               <th scope='col'><b>EVENT NAME</b></th>
               <th scope='col' style='text-align:center;'><b>DESCRIPTION</b></th>
               <th scope='col'><b>DATE</b></th>
               <th scope='col'><b>TIME</b></th>
              </tr>
        </thead>";
         
        $i = 0;
         while($i = mysqli_fetch_array($res))
        {
            echo"
       <tr><td>{$i['e_name']}</td><td>{$i['e_desc']}</td><td>{$i['e_date']}</td><td>{$i['e_time']}</td></tr>\n";
        }
    
      echo"</table>
      </div>
    </body>
    </html>";
        
        
      
       
    }
    }}?>