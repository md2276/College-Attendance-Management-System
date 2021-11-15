<?php
    session_start();
    $u=$_SESSION['user_name'];
if(!isset($_SESSION['adminloggedin']) || $_SESSION['adminloggedin']!=true){
    header('location:adminlogin.php');
}
else{
    error_reporting(0);
	$server="localhost";
	$username="root";
	$password="";
    $dbname="attendancesystem";
	$con=mysqli_connect($server,$username,$password,$dbname);
	if(!$con){
		die("Connection to the database failed".mysqli_connect_error());
	}
	else{
		//echo "<script>alert('Connection success')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    <h1>WELCOME ADMIN</h1>
    <img src="https://image.flaticon.com/icons/png/512/1177/1177568.png" class="avatar">
    <br><div class="reg-form" id="body2">
    <h2><a href="student.php" target="_blank" id="mybtn"> ADD STUDENT </a></h2>
    <h2><a href="teacher.php" target="_blank" id="mybtn"> ADD TEACHER </a></h2>
    <h2><a href="studentall.php" target="_blank" id="mybtn">VIEW STUDENT</a></h2>           
    <h2><a href="allteacher.php" target="_blank" id="mybtn">VIEW TEACHER</a></h2> 
    <a href="logout.php"><input type="submit" name="submit" value="LOG OUT"></a>    
    </div>  
</body>
<style type="text/css">
    
    body {
        margin: 0;
        padding: 0;
        background-image: url("https://images.pexels.com/photos/1903702/pexels-photo-1903702.jpeg");
        background-size: cover;
        background-position:initial;
        font-family: sans-serif;
        font-weight:bold;
    }
    #body2{
        border-style: solid;
        width: 420px;
        height: 420px;
        margin: 0px 0px;
        padding: 5px 5px;
        border: solid 5px;
        box-shadow: 3px 5px white;
        border-style: inset;
        border-color:white;
        text-align: center;
        color:gold;
        font-weight:bold;
        text-align: center;
        margin: 0 auto;

    }
    .avatar {
        width: 100px;
        height: 100px;
        margin-top:0px;
        margin-left:20px ;
        border-radius: 0%;
        position: absolute;
        top: 80px;
        left: calc(47% - 50px);
        
    }
        .reg-form  
    {
        text-decoration: none;
        font-size: 15px;
        font-weight:bold;
        text-align: center;
        color:gold;
        margin-bottom: 25px;
        top: 50%;
        left: 45%;
        position: fixed;
        box-sizing: border-box;
        transform: translate(-40%, -40%);
        
        padding: 70px 40px;
      
      
    }
    .reg-form a 
    {
        text-decoration: none;
        color:gold;
      
    }
    .reg-form a:hover
    {
        color:springgreen;
    }
    .reg-form input[type="submit"]
    {
        border: none;
        outline: navajowhite;
        height: 70px;
        width: 200px;
        background: rgba(117, 168, 170,0.3);
        color:brown;
        font-size: 18px;
        border-radius: 10px;
        text-align: center;
        margin-left:0px ;
        font-weight:bold;
    }
    .reg-form input[type="submit"]:hover
    {
        cursor: pointer;
        background-color: rgba(21, 163, 156, 0.5);
        color:cornsilk;
        
    }
    #mybtn{
        background: rgba(117, 168, 170,0.4);
        color:brown;
        padding: 10px;
        align:center;
        text-decoration:none;
        border-radius:5px;
        display:inline-block;
        margin-bottom:15px;
    }
    #mybtn:hover{
        background:linear-gradient(90deg,#0162c8,#55e7fc);
        color:white;
        padding:10px;
    }
    h1{
        border-style: solid;
        width: 1575px;
        height: 50px;
        margin : 0px;
        margin-left:-50px;
        padding: 5px 5px;
        border: none;
        background-color: rgba(21, 163, 156, 0.5);
        text-align: center;
        color:white;
    }
    </style>
</html>