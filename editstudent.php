<?php
session_start();
$u=$_SESSION['user_name'];
if(!isset($_SESSION['studentloggedin']) || $_SESSION['studentloggedin']!=true){
    header('location:studentlogin.php');
}
else{
?>
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
$f=$_GET['f'];
 $a=$_GET['a'];
 $user=$_GET['u'];
 $e=$_GET['e'];
 $p=$_GET['p'];
 if(isset($_POST['father'])){
    $f=$_POST['father'];
    $a=$_POST['address'];
    $p=$_POST['phone'];
    $e=$_POST['email'];
    if(strlen($p)!=10){
        echo "<span style='color:red;'>Invalid mobile number range</span>";
    }
    else{
    $query="UPDATE student set address='$a',father='$f',email='$e',phone='$p' where user='$user'";
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
	<title>Edit Student Details</title>
</head>
<body>
<header>
        <nav>           
            <ul class="nav_links">

                
                <li><a href="studenthome.php">BACK</a></li> 
                <li><a  href="studentattendance.php">ATTENDANCE</a></li>
                <li><h1>UPDATE DETAILS</h1></li>                             
            </ul>
        </nav>
        <!--a class="cta" href=''><button>ATTENDANCE</button></a-->
        <a class="cta" href="logout.php"><button>LOG OUT</button></a>
    </header>
			<div class="login-box">
			<form class="container" method="post">
				<div class="l"><label for="Father Name">Father Name</label></div>
				<input type="text" name="father" value="<?php echo $f; ?>"  required>
				<label for="address">Address</label>
				<input type="text" name="address" value="<?php echo $a; ?>"  required>
                <label for="email">Email Address</label>
				<input type="email" name="email" value="<?php echo $e; ?>"  required>
                <label for="phone">Mobile Number</label>
				<input type="number" name="phone" value="<?php echo $p; ?>"  required>
				<input type="submit" name="update" value="Update">
			</form>
		</div>
</body>
<style type="text/css">
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
    color:#edf0f1;
    text-decoration: none;
}
header{
    border:none;
    height:1px;
    width:1229px;
    background:rgba(00, 250, 250, 0.5);
    display: flex;
    top:0;
    position:absolute;
    justify-content: space-between;
    align-items: center;
    padding: 25px 10%;
}
h1{
    margin-left:5px;    
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
    color:indigo;
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
    background: rgba(0,0,60,0.6); 
}
        body {
        margin: 0;
        padding: 0;
        background-image: url("https://images.pexels.com/photos/2049422/pexels-photo-2049422.jpeg");
        background-size: cover;
        color: rgba(00, 250, 250, 0.7);
        background-position:initial;
        font-family: Arial;
    }
    .login-box {
        width: 320px;
        height: 420px;
        background:  rgba(0, 0, 0, 0.5);
        color: rgba(00, 250, 250, 0.7);
        margin-top:0px;
        margin-bottom:0px;
        top: 50%;
        left: 50%;
        position: absolute;
        transform: translate(-50%, -50%);
        box-sizing: border-box;
        padding: 70px 40px;
        box-shadow: 2px 2px rgba(255,255,255,1);
        border: solid 2px rgba(255,255,255,1);
    }
    .login-box input {
        width: 100%;
        margin-bottom: 20px;
        top: 5px;
        transform: translate(-80%, -110%);
    }
    .l{
        margin-top:-50px;
        top:25%;        
        margin-bottom:0px;
        
    }
    .login-box input[type="text"], input[type="password"],input[type="email"],input[type="number"]
    {
        border: 1px solid rgba(255,255,255,0.3);
        background: transparent;
        outline: none;
        height: 35px;
        color: white;
        top:-10%;
        transform: translate(0%, 20%);
        font-size: 22px;
        font-weight:bold;       
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
        color: #fff;
        font-size: 18px;
        padding:8px;
        top:-10%;
        transform: translate(0%, 20%);
        background-color:rgba(00, 250, 250, 0.7);
        border-radius: 6px;
        margin-bottom:20px;
        margin-left:3px;
    }
    .login-box input[type="submit"]:hover
    {
        background:linear-gradient(90deg,#0162c8,#55e7fc);
        color:brown;
        cursor: pointer;
    }    
    #mybtn1{    
        background-color: rgba(00, 250, 250, 0.7);
        color:brown;
        padding: 10px;
        margin-top:35px;
        margin-left:70px;
        text-decoration:none;
        border-radius:5px;
        display:inline-block;
    }
    #mybtn1 + #mybtn1{
        margin-right:1200px;
    }
    #mybtn1:hover{
        background:steelblue;
        color:black;
        padding:8px;
    }
    label{
        font-weight:bold;
        font-size:22px;
    }
    .h{
        margin-left:1260px;
        margin-top:-80px;
    }

    </style>
</html>
