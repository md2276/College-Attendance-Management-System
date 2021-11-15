<?php
    session_start();
    $u=$_SESSION['user_name'];
    if(!isset($_SESSION['adminloggedin']) || $_SESSION['adminloggedin']!=true){
        header('location:adminlogin.php');
    }
    else{
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
    if(isset($_POST['register'])){
	$name=$_POST['name'];
	$address=$_POST['address'];
    $gender=$_POST['gender'];
	$state=$_POST['state'];
	$city=$_POST['city'];
	$dob=$_POST['dob'];
    $dept=$_POST['dept'];
    $qualification=$_POST['qualification'];
    $university=$_POST['university'];
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
        if(strlen($phone)!=10){
        echo "<span style='color:red;'>Invalid mobile number range</span>";
    }
    else{
	$sql="INSERT INTO `teacher` VALUES ('$name', '$address', '$gender', '$state', '$city', '$dob', '$dept', '$qualification',  '$folder', '$university', '$user','$pswd', '$email', '$phone');";
    if($con->query($sql)==true){
        $insert=true;
        echo "<script>alert('Registration successful')</script>";
        //exit();
    }
    else{
        //echo "Error:$sql <br> $con->error";
        echo "<script>alert('Registration Failed')</script>";
    }
    $con->close();
}
    }
}    
?>
<html>
<head><title>Teacher Registration</title></head>
<body>
<h1>TEACHER REGISTRATION FORM</h1>
    <div class="form-box">
<form action="teacher.php" method="POST" enctype="multipart/form-data">
<fieldset>
<legend>TEACHER DETAILS</legend>
<ul type="disc">
<li><b>NAME :</b></li>
<input type="text" size="30" name="name" placeholder="Enter Name" required><br /><br>
<li><b>  ADDRESS :</b></li>
<input type="text" size="50" name="address" placeholder="Enter Address"/><br /><br />
<li><b> STATE :</b></li>
<input type="text" size="50" name="state" placeholder="Enter State"/><br /><br />
<li><b> CITY :</b></li>
<input type="text" size="50" name="city" placeholder="Enter City"/><br /><br />
<li><b> GENDER :</b><br /></li>
<div class="radio-group">
<label class="radio">
<input type="radio" value="male" name="gender"/>MALE
<span></span>
</label>
<label class="radio">
<input type="radio" value="female" name="gender"/>FEMALE
<span></span>
</label>
</div>
<br />
<li><b> DATE OF BIRTH :</b></li>
<input type="date" id="birthday" name="dob"/><br>
<li><b>DEPARTMENT :</b></li>
        <input type="text" size="30" name="dept" placeholder="Enter Department Name" required>
</ul>
</fieldset>
<fieldset>
    <legend>ACADEMICS DETAILS</legend>
    <ul type="disc">
        <li><b>QUALIFICATION :</b></li>
        <input type="text" size="30" name="qualification" placeholder="Enter Qualification" required/><br /><br \>
        <li><b>UNIVERSITY :</b></li>
        <input type="text" size="30" name="university" placeholder="Enter University" required>
        </ul>
</fieldset>
<fieldset>
<legend>LOGIN DETAILS</legend>
<ul type="disc">
<li><b>IMAGE :</b></li>
<input type="file" name="image"/><br /><br \>
<li><b>USERNAME :</b></li>
<input type="text" size="30" name="user" placeholder="Enter Username" required/><br /><br \>
<li><b>PASSWORD :</b></li>
<input type="text" size="30" name="pswd" placeholder="Enter Password" required/>
</fieldset>
<fieldset>
<legend >CONTACT DETAILS</legend>
<ul type="disc">
<li><b>EMAIL ADDRESS :</b></li>
<input type="email" size="30" name="email"  placeholder="Enter Email" required/><br /><br \>
<li><b>MOBILE NUMBER :</b></li>
<input type="number" size="30" name="phone" placeholder="Enter Mobile Number" required/><br /><br \>
</ul>
<input type="submit" value="Register" name="register"/>
</fieldset>
</legend>
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
        margin: 0;
        padding: 0;
        color:white;
        background-image: url("https://images.pexels.com/photos/2846814/pexels-photo-2846814.jpeg");
        background-size: cover;
        background-position: center;
        font-family: sans-serif;
        border-radius: 10px;
    }
    span{
        top:1050px;
        left:20px;
        position: absolute;
    }
    .radio{
        font-size:22px;
        font-weight:500;
        text-transform:capitalize;
        display:inline-block;
        vertical-align:middle;
        color:white;
        position:relative;
        padding-left:22px;
        cursor:pointer;
    }
    .radio + .radio{
        margin-left:20px;
    }
    .radio input[type="radio"]{
        display:none;
    }
    .radio span{
        height:20px;
        width:20px;
        border-radius:50%;
        border:4px solid crimson;
        display:block;
        position:absolute;
        left:0;
        top:7px;
    }
    .radio span:after{
        content:"";
        height:10px;
        width:10px;
        background:orangered;
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
	.form-box input[type="text"],[type="email"],[type="number"]
    {
        border: none;
        -webkit-appearance:none;
        -ms-appearance:none;
        -moz-appearance:none;
        appearance:none;
        background:rgba(105,105,105,0.5);
        padding:12px;
        border-radius:3px;
        width:250px;
        height:30px;
        outline:none;
        color:white;
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
        height: 40px;
        width: 130px;
        background: #1c8ad;
        background: YellowGreen ;
        color:white;
        margin-top:13px;
        font-size: 25px;
        margin-left:44px;
        border-radius: 8px;
    }
    .form-box input[type="date"]
    {
        border: none;
        background:#2E765E;
        background:rgba(244,164,96,0.5);
        font-size:20px;
        font-weight:500;
        color:white;
        border-radius: 8px;
        padding:10px 10px;
    }
    .form-box input[type="file"]
    {
        border: none;
        background:rgba(244,164,96,0.3);
        font-size:20px;
        font-weight:500;
        color:navajowhite;
        border-radius: 8px;
        padding:10px 10px;

    }
    .form-box input[type="submit"]:hover
    {
        cursor: pointer;
        background:crimson;
    }
    legend{
        font-size:25px;
        font-weight:600px;
        text-align:center;
        color:crimson;
    }
    h1{
        text-align:center;
        margin-bottom:10px;
        color:crimson;
    }
    
    </style>

</html>