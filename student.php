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
	$con=mysqli_connect($server,$username,$password);
	if(!$con){
		die("Connection to the database failed".mysqli_connect_error());
	}
	else{
		//echo "success";
    }
	if(isset($_POST['register'])){
	$name=$_POST['name'];
	$father=$_POST['father'];
	$address=$_POST['address'];
	$state=$_POST['state'];
	$city=$_POST['city'];
    $rollno=$_POST['rollno'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
    $image=$_FILES['image']['name'];
    $temp=$_FILES['image']['tmp_name'];
    $new_file_name=time().$image;
    $folder ="upload/" . "$image";
    move_uploaded_file($temp,$folder);
    $user=$_POST['user'];
    $password=$_POST['pswd'];
    $pswd=password_hash($password,PASSWORD_DEFAULT);
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$guardian=$_POST['guardian'];
    if(strlen($phone)!=10){
        echo "<span style='color:red;'>Invalid mobile number range</span>";
    }
    else{
	$sql="INSERT INTO `attendancesystem`.`student` VALUES ('$name', '$father', '$address', '$state', '$city', '$rollno', '$gender', '$dob','$folder','$user','$pswd', '$email', '$phone', '$guardian')";
    if($con->query($sql)==true){
        $insert=true;
        echo "<script>alert('Registration successful')</script>";
    }
    else{
       // echo "Error:$sql <br> $con->error";
        echo "<script>alert('Registration Failed')</script>";
    }
}
    $con->close();
}
    }
?>
<html>
<head><title>Student Registration</title></head>
<body>
<h1>STUDENT ENROLLMENT FORM</h1>
<div class="form-box">
<form action="" method="POST" enctype="multipart/form-data">
<fieldset>
<legend align="center"><b>STUDENT DETAILS</b></legend>
<ul type="disc">
<li><b> STUDENT NAME :</b></li>
<input type="text" size="30" name="name" placeholder="Enter Name"/><br /><br />
<li><b> FATHER NAME :</b></li>
<input type="text" size="30" name="father" placeholder="Enter Father Name"/><br /><br />
<li><b> ADDRESS :</b></li>
<input type="text" size="50" name="address" placeholder="Enter Address"/><br /><br />
<li><b> STATE :</b></li>
<input type="text" size="50" name="state" placeholder="Enter State"/><br /><br />
<li><b> CITY :</b></li>
<input type="text" size="50" name="city" placeholder="Enter City"/><br /><br />
<li><b> ROLL NO :</b><br /></li>
<input type="number" size="30" name="rollno" placeholder="Enter Roll Number" required/><br /><br \>
<div class="radio-group">
<li><b> GENDER :</b><br /></li>
<label class="radio">
<input type="radio" value="male" name="gender"/>
MALE
<span></span>
</label>
<label class="radio">
<input type="radio" value="female" name="gender"/>
FEMALE
<span></span>
</label>
</div>

<br />
<li><b> DATE OF BIRTH :</b></li>
<input type="date" id="birthday" name="dob"/>
</ul>
</fieldset>
<fieldset>
<legend align="center"><b>LOGIN DETAILS</b></legend>
<ul type="disc">
<li><b>IMAGE :</b></li>
<input type="file" name="image"/><br /><br \>
<li><b>USERNAME :</b></li>
<input type="text" size="30" name="user" placeholder="Enter Username" required/><br /><br \>
<li><b>PASSWORD :</b></li>
<input type="text" size="30" name="pswd" placeholder="Enter Password" required/>
</fieldset>
<fieldset>
<legend align="center"><b>CONTACT DETAILS</b></legend>
<ul type="disc">
<li><b>EMAIL ADDRESS :</b></li>
<input type="email" size="30" name="email" placeholder="Enter Email" required/><br /><br \>
<li><b>MOBILE NUMBER :</b></li>
<input type="number" size="30" name="phone" placeholder="Enter Mobile Number" required/><br /><br \>
<li><b>GURDIAN'S CONTACT NUMBER :</b></li>
<input type="number" size="30" name="guardian" placeholder="Enter Guardian Contact Number" required/><br />
<br />
<input type="submit" value="Register" name="register" /><br>
</form>
</div>
</body>
<style type="text/css">
*{
        margin:0;
        padding:0;
        box-sizing: border-box;
    }
    body {
        margin-bottom: 10px;
        padding: 0;
		color:	#F4A460	;
        background-image: url("https://images.pexels.com/photos/3091121/pexels-photo-3091121.jpeg");
        background-size: cover;
        background-position: center;
        font-family: sans-serif;
    }
    h1{
        text-align:center;
        margin-bottom:10px;
    }
    legend{
        color:white;
        background:rgba(0,0,0,0.2);
        font-size:25px;
    }
    .radio{
        font-size:22px;
        font-weight:600;
        text-transform:capitalize;
        display:inline-block;
        vertical-align:middle;
        color:white;
        position:relative;
        padding-left:30px;
        cursor:pointer;
    }
    .radio + .radio{
        margin-left:20px;
    }
    .radio input[type="radio"]{
        display:none;
    }
    .radio span{
        height:18px;
        width:18px;
        border-radius:50%;
        border:4px solid lightblue;
        display:block;
        position:absolute;
        left:0;
        top:7px;
    }
    .radio span:after{
        content:"";
        height:10px;
        width:10px;
        background:blue;
        display:block;
        position:absolute;
        left:50%;
        top:50%;
        transform:translate(-50%,-50%) scale(0);
        border-radius:50%;
        transition:300ms ease-in-out 0s;
    }
    .radio input[type="radio"]:checked ~ span:after{
        transform:translate(-50%,-50%) scale(1);  
    }
	.form-box input[type="text"],[type="number"],[type="email"]
    {
        border: none;
        color: #E2808A;
        -webkit-appearance:none;
        -ms-appearance:none;
        -moz-appearance:none;
        appearance:none;
        background:rgba(135,206,250,0.5);
        padding:12px;
        border-radius:3px;
        width:250px;
        height:30px;
        outline:none;
    }
    input:focus::placeholder{
    color:transparent;
    }
    input::placeholder{
        color:white;
        transition:color 0.3s ease;
    }
	.form-box input[type="submit"]
    {
        border: none;
        background-color:rgba(0,0,139,0.8);
        font-size:22px;
        font-weight:650;
        color:white;
        border-radius: 8px;
        padding:12px 12px;
        margin-bottom:10px;
        
        box-shadow: 2px 4px;
    }
    .form-box input[type="date"]
    {
        border: none;
        background:rgba(0,0,0,0.5);   
        font-size:20px;
        font-weight:500;
        color:navajowhite;
        border-radius: 8px;
        padding:10px 10px;
        margin-bottom:10px;
    }
    .form-box input[type="file"]
    {
        border: none;
        background:rgba(0,0,0,0.3);
        
        font-size:20px;
        font-weight:500;
        color:navajowhite;
        border-radius: 8px;
        padding:10px 10px;
        margin-bottom:10px;
    }
    .form-box input[type="submit"]:hover
    {
        cursor: pointer;
        background:crimson;
    }
    </style>

</html>