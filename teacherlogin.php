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
    $sql="SELECT * FROM teacher WHERE user='$username'";
    $data=mysqli_query($con,$sql);
    $total=mysqli_num_rows($data);
    if($total==1){
        while($row=mysqli_fetch_assoc($data)){
        if(password_verify($password,$row['pswd'])){
        $_SESSION['user_name']=$username;
        $_SESSION['teacherloggedin']=true;
        header('location:teacherhome.php');
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
<html>
    <head><title>Teacher Log In</title></head>
    <body>
    <h1>TEACHER LOG IN</h1>
    <div class="login-box">
    <img src="https://cdn1.vectorstock.com/i/thumb-large/38/10/solid-purple-gradient-user-icon-web-icon-vector-23623810.jpg" class="avatar">

    <form class="container" method="post">
            <div class="input box">
            <br>
            <i class="fa fa-user" aria-hidden="true"></i>
            <b>USERNAME</b>
            <input type="text" placeholder="username please" name="user" required>
        </div>
        <div class="input box">
            <i class="fa fa-lock" aria-hidden="true"></i>
            <b>PASSWORD</b>
            <input id="pswrd" type="password" placeholder="password please" name="pswd" required>
                <span class="eye" onclick = "show()">
                    <i id="hide1" class="fa fa-eye" aria-hidden="true"></i>
                    <i id="hide2" class="fa fa-eye-slash" aria-hidden="true"></i>
                </span>
                </div>
                <input type="submit" name="submit" value="LOG IN" color="black">
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
    body {
        margin: 0;
        padding: 0;
        background-image: url("https://images.pexels.com/photos/584302/pexels-photo-584302.jpeg");
        background-size: cover;
        background-position: center;
        font-family: sans-serif;
        font-size:20px;
        font-weight:bold;
    }
    h1 {
        font-size: 30px;
    
        border-style: solid;
        width: 1550px;
        height: 40px;
        margin: 0px;
        padding: 10px 10px;
        border: none;
        background-color: rgba(8, 21, 89, 0.5);
        text-align: center;
        color:white;
    }
    .login-box {
        width: 320px;
        height: 400px;
        background:  rgba(0, 0, 0, 0.5);
        color: #fff;
        top: 50%;
        left: 50%;
        position: absolute;
        transform: translate(-50%, -50%);
        box-sizing: border-box;
        padding: 70px 40px;
        box-shadow: 3px 3px rgba(255,205,255,1);
        border-style: inset;
        border-color:rgba(255,255,255,1);
        border: solid 5px;
    }
    .avatar {
        width: 100px;
        height: 100px;
        border-radius: 100%;
        position: absolute;
        top: -60px;
        left: calc(52% - 50px);
        
    }
    .login-box p{
        margin: 0;
        padding: 0;
        font-weight: bold
    }
    .login-box input {
        width: 100%;
        margin-bottom: 30px;
        margin-top:10px;
    }
    .login-box input[type="text"], input[type="password"]
    {
        border: none;
        border-bottom: 1px solid #fff;
        background: transparent;
        outline: none;
        height: 40px;
        color: #fff;
        font-size: 20px;
    }
    .login-box input[type="submit"]
    {
        border: none;
        outline: none;
        height: 40px;
        background: #1c8adb;
        color: #fff;
        font-size: 20px;
        padding:8px;
        
        background-color: rgba(8, 21, 89, 0.8);
        border-radius: 20px;
    }
    .login-box input[type="submit"]:hover
    {
        background:linear-gradient(90deg,#0162c8,#55e7fc);
        color:brown;
        cursor: pointer;
    }
    .eye
    {
        position: absolute;
        margin-top: 20px;
    }
    #hide1
    {
        display: none;
    }
    </style>
</html>