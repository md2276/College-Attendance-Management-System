<?php 
	error_reporting();
    session_start();
    $u=$_SESSION['user_name'];
if(!isset($_SESSION['adminloggedin']) || $_SESSION['adminloggedin']!=true){
    header('location:adminlogin.php');
}
    else{
    $server = "localhost";
	$username = "root";
	$password =	"";
    $dbname="attendancesystem";
	$conn = new mysqli($server, $username, $password, $dbname);
	if ($conn->connect_error) {
		echo die("Connection_failed " .$conn->connect_error);
	} 
    else{
        //echo "success";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $sql="SELECT * FROM attendance_records";
    $result = mysqli_query($conn,$sql);
    $html='<table class="center"><col width:"30"><tr><th >Date</th><th>Student Name</th><th>Roll Number</th><th>Semester</th><th>Subject</th><th>Attendance Status</th></tr>';
    while($row=mysqli_fetch_array($result)){ 
        $html.='<tr><td>'.$row['date'].'</td><td>'.$row['name'].'</td><td>'.$row['roll_number'].'</td><td>'.$row['semester'].'</td><td>'.$row['subject'].'</td><td>'.$row['attendance_status'].'</td></tr>';
    }
    $html.='</table>';
    header('content-Type:application/xls');
    header('content-Disposition:attachment;filename=attendance.xls');
    echo $html;
}
?>  
</body>
<style type="text/css">
*{
    margin-left:auto;
    margin-right:auto;
 }
    table{
        box-shadow:3px 5px white;
    }
    table,th,tr,td{
        border: solid 3px white;
        color:white;
        background:rgba(10,80,160,0.3);
        width: 1000px;
        font-size: 15px;
        border-collapse: collapse;
    }
    th,tr,td{
        text-align: center;
        border:solid 2px white;
        border-collapse: collapse;
        color:white;
        
    }
    body{
        background:linear-gradient(rgba(68,170,255,1),rgba(17,175,218,1));
    }
    th{
        
        background-color: rgb(73, 216, 230);
    }
    table,th,td{
        border-collapse: collapse;
    }
    th,td{
        padding: 15px;
        margin:15px;
    }
</html>
