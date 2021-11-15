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
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Edit Details</title>
</head>
<body>
			
<h2>
        <a  href="logout.php" id="mybtn1">LOG OUT</a>
    <div class="h">
        <a href="teacherhome.php" id="mybtn1">BACK</a>
    </div>
    <h2>
			<div class="login-box">
            <h1 class>Update Details</h1>
			<form class="container" method="post">
				
				<label for="Father Name">Qualification</label>
				<input type="text" name="qualification" value="<?php echo $q; ?>"  required>
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
        body {
        margin: 0;
        padding: 0;
        background-image: url("https://images.unsplash.com/photo-1469719847081-4757697d117a?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8ZGVza3RvcCUyMHdhbGxwYXBlcnN8ZW58MHx8MHx8&ixlib=rb-1.2.1");
        background-size: cover;
        color: rgba(00, 250, 250, 0.7);
        background-position:initial;
        font-family: Arial;
    }
    
    .login-box h1{
        width: 350px;
        height: 40px;
        font-size: 26px;
        border-bottom: solid 2px white;
        color: white;
        top: 2%;
        left: 50%;
        padding:5px 5px;
        position: absolute;
        text-align:center;
        transform: translate(-50%, -66%);
        box-sizing: border-box;
    }

    .login-box {
        width: 350px;
        height: 480px;
        background:  rgba(0, 0, 0, 0.3);
        color: rgba(00, 250, 250, 0.7);
        margin-top:0px;
        margin-bottom:0px;
        top: 50%;
        left: 50%;
        position: absolute;
        transform: translate(-0%, -50%);
        box-sizing: border-box;
        padding: 70px 40px;
        box-shadow: 2px 2px rgba(255,255,255,1);
        border: solid 2px rgba(255,255,255,1);
    }
    .login-box input {
        width: 100%;
        margin-bottom: 20px;
        
        
    }
    .login-box input[type="text"], input[type="password"],input[type="email"],input[type="number"]
    {
        border: 1px solid rgba(255,255,255,0.3);
        background: transparent;
        outline: none;
        height: 35px;
        color: white;
        top:-10%;
        font-size: 20px;
        
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
        background-color:rgba(00, 250, 250, 0.7);
        border-radius: 6px;
        margin-bottom:30px;
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
    .h{
        margin-left:1260px;
        margin-top:-80px;
    }
    .container{
        margin-top:0%;
    }
    </style>
</html>
