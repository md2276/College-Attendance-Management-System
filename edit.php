<?php 
	error_reporting();
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
    session_start();
    $u=$_SESSION['user_name'];
    if(!isset($_SESSION['teacherloggedin']) || $_SESSION['teacherloggedin']!=true){
    
        header('location:teacherlogin.php');
    }
    else{
$q=$_GET['q'];
 $a=$_GET['a'];
 $user=$_GET['u'];
 $e=$_GET['e'];
 $p=$_GET['p'];
 if($_POST['update']){
    $a=$_POST['address'];
    $p=$_POST['phone'];
    $e=$_POST['email'];
    $q=$_POST['qualification'];
    if(strlen($p)!=10){
        echo "<span style='color:red;'>Invalid mobile number range</span>";
    }
    else{
    $query="UPDATE teacher set address='$a',qualification='$q',email='$e',phone='$p' where user='$user'";
    $data=mysqli_query($conn,$query);
    if($data){
        echo "<script>alert('Record Updated Successfully')</script>";
    }
    else{
        echo "Failed to record update";
    }
}
 }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Edit Details</title>
</head>
<body>
<header>
        <nav>           
            <ul class="nav_links">

                
                <li><a href="teacherhome.php">BACK</a></li> 
                <li><a  href="attendance.php">ATTENDANCE</a></li>
                <li><h1>UPDATE DETAILS</h1></li>                             
            </ul>
        </nav>
        <!--a class="cta" href=''><button>ATTENDANCE</button></a-->
        <a class="cta" href="logout.php"><button>LOG OUT</button></a>
    </header>
			<div class="login-box">
            
            
			<form class="container" method="post">
            <div class="l"><label for="Father Name">Qualification</label></div>
				<input type="text" name="qualification" value="<?php echo $q; ?>"  required>
				<label for="address">Address</label>
				<input type="text" name="address" value="<?php echo $a; ?>"  required>
                <label for="email">Email Address</label>
				<input type="email" name="email" value="<?php echo $e; ?>"  required>
                <label for="phone">Mobile Number</label>
				<input type="number" name="phone" value="<?php echo $p; ?>"  required>
				<input type="submit" name="update" value="Update">
			
            <div class="h2">
    <div class="h">
        
    </div>
    </form>
		</div>
</body>
<style type="text/css">
*{
    margin:0;
    padding: 0;
    box-sizing: border-box;    
}
li,a,button{
    font-size: 18px;
    font-weight: 500;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    color:blanchedalmond;
    text-decoration: none;
}
header{
    border:none;
    height:1px;
    width:1535px;
    background:rgba(0,0,0, 1);
    display: flex;
    top:0;
    color:blanchedalmond;
    position:absolute;
    justify-content: space-between;
    align-items: center;
    padding: 25px 10%;
}
h1{
    margin-left:38px;    
}
.nav_links{
    list-style: none;
}
.nav_links li{
display: inline-block;
padding: 0px 60px;
}
.nav_links li a{
    transition: all 0.3s ease 0s;
}
.nav_links li a:hover{
    color:steelblue;
}
button{
    padding: 9px 25px;
    background: linear-gradient(#0162c8,#55e7fc);
    border:none;
    border-radius: 10px;
    cursor:pointer;
    margin-left:-100px;
    transition: all 0.3s ease 0s;
}
button:hover{
    background: blanchedalmond; 
    color:steelblue;
}
        body {
        margin: 0;
        padding: 0;
        background-image: url("https://images.pexels.com/photos/325225/pexels-photo-325225.jpeg");
        background-size: cover;
        background-color: rgba(0,0,0,0.5);
        color:orange;
        background-position:initial;
        font-family: Arial;
        font-weight:bold;
    }
    
    .login-box {
        width: 300px;
        height: 400px;
        background:  rgba(0, 0, 0, 0.5);
        color: white;
        top: 50%;
        left: 50%;
        border-radius:6px 6px 0 0;
        overflow:hidden;
        box-shadow: 0 0 5px 5px rgba(255,255,255,0.2);
        position: absolute;
        transform: translate(-50%, -70%);
        box-sizing: border-box;
        padding: 50px 40px;
        
    }
    .login-box input {
        width: 100%;
        margin-top:-10px;
        margin-bottom: 20px; 
    }
    
    .login-box input[type="text"], input[type="password"],input[type="email"],input[type="number"]
    {
        border: 1px solid rgba(255,255,255,0.3);
        background: transparent;
        outline: none;
        height: 35px;
        color: white;
        top:-13%;
        font-size: 20px;
        margin-top:10px;
    }
    input:focus::placeholder{
    color:transparent;
    }
    input::placeholder{
        color:white;
        transition:color 0.3s ease;
        font-size:15px;
    }
    .login-box input[type="submit"]
    {
        border: none;
        outline: none;
        height: 40px;
        background: #1c8adb;
        color: #fff;
        font-size: 18px;
        padding:8px;
        background-color:rgba(128, 128, 128, 0.5);
        border-radius: 6px;
        margin-top:10px;
        margin-bottom:80px;
        margin-left:3px;
    }
    .login-box input[type="submit"]:hover
    {
        background:linear-gradient(90deg,#0162c8,#55e7fc);
        color:brown;
        cursor: pointer;
        margin-top:-20px;
    }
    .l{
        margin-top:-42px;
        
    }
   
    #mybtn{   
        background-color:rgba(128, 128, 128, 0.5); ;
        color:white;
        padding: 8px 8px;
        margin-top:-70px;
        margin-left:3px;
        width:260px;
        height:23px;
        font-size:18px;
        text-decoration:none;
        border-radius:6px;
        display:inline-block;
    }
    #mybtn:hover{
        background:linear-gradient(90deg,#0162c8,#55e7fc);
        color:brown;
        padding:10px;
    }
    #mybtn1{   
        background-color:rgba(128, 128, 128, 0.5);
        color:white;
        padding: 8px 8px;
        width:277px;
        height:23px;
        font-size:18px;
        font-weight:500px;
        text-align:center;
        margin-top:-80px;
        margin-left:5px;
        text-decoration:none;
        border-radius:6px;
        display:inline-block;
    }
    #mybtn1:hover{
        background:linear-gradient(90deg,#0162c8,#55e7fc);
        color:brown;
        padding:10px;
    }
    .h{
        margin-left:0px;
        margin-top:30px;
        position:absolute;
    }
    .h1{
        margin-left:0px;
        margin-top:22px;
        margin-bottom:60px;
    }
    .h2{
        text-align:center;
        top: 20px;
        transform:translate(0%,-85%);
    }
    </style>
</html>
