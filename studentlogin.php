<?php
    session_start();
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

if(isset($_POST['submit'])){
    $username=$_POST['user'];
    $password=$_POST['pswd'];
    $sql="SELECT * FROM student WHERE user='$username'";
    $data=mysqli_query($con,$sql);
    $total=mysqli_num_rows($data);
    if($total==1){
        while($row=mysqli_fetch_assoc($data)){
        if(password_verify($password,$row['pswd'])){
        $_SESSION['user_name']=$username;
        $_SESSION['studentloggedin']=true;
        header('location:studenthome.php');
    }
    else{
        echo "<script>alert('Login Failed')</script>";
            }
}
        }
    else{
        echo "<script>alert('Login Failed')</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Student Log In</title>
</head>
<body>
		
        <div class="login-box">	
            <form class="container" method="post"><br>
            <h1>Student Log In</h1>
            <br><br><br><br><div class="fa"><i class="fa fa-user" aria-hidden="true"></i></div>
                <label for="user">Username</label>
				<input type="text" name="user" placeholder="username please"  required>
				<div class="fa1"><i class="fa fa-lock" aria-hidden="true"></i></div>
                <div class="ps"><label for="pswd">Password</label></div>
                <span class="eye" onclick = "show()">
                    <i id="hide1" class="fa fa-eye" aria-hidden="true"></i>
                    <i id="hide2" class="fa fa-eye-slash" aria-hidden="true"></i>
                </span>
				<input type="password" id="pswrd" name="pswd" placeholder="password please" required>
                <input type="submit" name="submit" value="Log In">
			</form>
		</div>
        <script>
        function show()
        {
            var x = document.getElementById("pswrd");
            var y = document.getElementById("hide1");
            var z = document.getElementById("hide2");
            if(x.type === 'password')
            {
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
            }
            else{
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
            }
           
        }
        </script> 
</body>
<style type="text/css">
@import "https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css";
*,*:before,*:after{
    padding:0px;
    margin:0px;
    box-sizing:border-box;
}
.eye
    {
        position: absolute;
        margin-top: 34px;
        margin-left:235px;
        color:white;
    }
    #hide1
    {
        display: none;
    }
    .ps{
        margin-left:48px;
        transform:translate(0%,-80%);
        margin-bottom:-20px;
    }
.fa{
    top:20%;
        transform:translate(0%,-6%);
            margin-left:17px;
    }
.fa1{
        margin-left:17px;
        margin-top:-5px; 
        top:2%;
        transform:translate(0%,12%);
    }
        body {
        margin: 0;
        padding: 0;  
        background-image: url("https://images.pexels.com/photos/1139556/pexels-photo-1139556.jpeg");
        background-size: cover;
        background-position: center; 
        background-color: #080710;
        color:white;
        background-position:initial;
        font-family: Arial;
    }
     h1{
        font-size: 25px;
        top: 13%;
        left: 44%;
        margin-bottom:40px; 
        position: absolute;
        text-align:center;
        transform: translate(-45%, -50%);
    }
    label{
        margin-left:0px;
        top:25%;
        font-size:20px;
        color:white;
        transform: translate(10%, 30%);
    }
    label.password{
        margin-left:0px;
        margin-top:5%;
        margin-bottom:-20px;
        top:25%;
        font-size:20px;
        transform: translate(10%, 30%);
    }
    .login-box {
        width: 320px;
        height: 380px;
        top: 50%;
        left: 50%;
        position: absolute;
        transform: translate(-45%, -60%);
    }
    form input {
        width: 80%;
        padding: 10px;
        margin:25px  30px 30px 30px;        
    }
    form input[type="text"], input[type="password"],input[type="email"]
    {
        border: 1px solid rgba(255,255,255,0.3);
        background: transparent;
        outline: none;
        height: 35px;
        color: white;
        top:-13%;
        font-size: 20px;
    }
    input:focus::placeholder{
    color:transparent;
    }
    input::placeholder{
        color:white;
        transition:color 0.3s ease;
        font-size:20px;
    }
    form input[type="submit"]
    {
        border: none;
        outline: none;
        height: 35px;
        color: white;
        font-size: 18px;
        padding:8px;
        background-color:rgba(70, 130, 180, 0.5);
        border-radius: 6px;
        margin-top:0px;
        margin-bottom:50px;
        width:80%;
    }
    form input[type="submit"]:hover
    {
        background:linear-gradient(#ff512f,yellow);
        color:brown;
        cursor: pointer;
        
    }
    #mybtn1{   
        background-color:rgba(161, 202, 241, 0.7);
        color:black;
        padding: 12px 12px;
        width:160px;
        height:60px;
        font-size:23px;
        font-weight:bold;
        text-align:center;
        text-decoration:none;
        border-radius:6px;
        display:inline-block;
    }
    #mybtn1:hover{
        background:linear-gradient(#ff512f,yellow);
        color:brown;
        padding:10px;
    }
    #mybtn2{   
        background-color:rgba(70, 130, 180, 0.5);
        color:white;
        padding: 12px 12px;
        width:252px;
        height:41px;
        font-size:21px;
        text-align:center;
        text-decoration:none;
        border-radius:6px;
        display:inline-block;
    }
    #mybtn2:hover{
        background:linear-gradient(#ff512f,yellow);
        color:brown;
        padding:10px;
    }
    .h{
        margin-left:0px;
        margin-top:0px;
        padding: 8px;
        top:40%;
        left:-150%;
        position:fixed;
    }
    .h1{
        margin-left:0px;
        margin-top:0px;
        padding: 8px;
        top:40%;
        left:205%;
        position:fixed;
    }.h2{
        margin-left:0px;
        margin-top:0px;
        padding:0;
        top:83%;
        right:10%;
        position:absolute;
    }
    form{
        width: 320px;
        height: 380px;
        background:rgba(0,0,0,0.5);
        position:absolute;
        transform:translate(-50%,-50%);
        top:50%;
        left:48%;
        color:white;
        border-radius:10px;
        border: solid 2px rgba(255,255,255,0.5);
        box-shadow:0 0 40px rhba(8,7,16,0.6);
    }
    form*{
        border:none;
    }
   
    </style>
</html>
