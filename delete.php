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
		//echo "success";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
<div class="box">
<div class="border">
<?php
$rollno=$_GET['r'];
$query="DELETE from student where roll_number='$rollno'";
$data=mysqli_query($con,$query);
if($data){
    echo "<span style='color:green'>Record Deleted!</span>";
}
else{
    echo "<span style='color:red'>Failed To Delete Record!</span>";
}}
?>
</div>
<a href='update.php' id="mybtn">BACK</a>
<a href='adminpage.php' id="mybtn1">ADMIN PAGE</a>
</div>
</body>
<style type="text/css">
.border{
    border-bottom:solid 3px white;
    height:42px;
    background:blanchedalmond;
}

body {
        margin: 0px;
        padding: 0px;
        background-image: url("https://images.unsplash.com/photo-1624095935275-4d1230cdf163?ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDc2fGJvOGpRS1RhRTBZfHxlbnwwfHx8fA%3D%3D&ixlib=rb-1.2.1");
        background-size: cover;
        background-position:initial;
        font-family: "Times New Roman", Times, serif;
        font-size:28px;
        text-align:center;
        box-sizing:border-box;
    }
.box{
    border: solid 3px rgba(255,255,255,1);
    box-shadow: 3px 5px rgba(255,255,255,1);
    height:260px;
    width:260px;
    color:green;
    transform:translate(230%,70%);
    position:absolute;
}
    span{
        height:35px;
        background:transparent;
        font-size:26px;
        padding-top:35px;
        top:10px;
        transform:translate:(50%,0%);

    }
    #mybtn{
        left:10%;
        top:0%;
        transform:translate(88%,200%);
        background: rgba(20, 20, 20,0.5);
        color:coral;
        padding: 5px;
        text-decoration:none;
        border-radius:5px;
        position:absolute;
        display:inline-block;
    }
    #mybtn:hover{
        background:linear-gradient(90deg,#0162c8,#55e7fc);
        color:brown;
        padding:5px;
    }
    #mybtn1{
        left:17%;
        top:0%;
        transform:translate(2%,360%);
        background: rgba(20, 20, 20,0.5);
        color:coral;
        padding: 5px;
        margin-top:20px;
        text-decoration:none;
        border-radius:5px;
        position:absolute;
        display:inline-block;
    }
    #mybtn1:hover{
        background:linear-gradient(90deg,#0162c8,#55e7fc);
        color:brown;
        padding:5px;
    }
</html>