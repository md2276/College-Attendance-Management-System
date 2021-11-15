<?php
session_start();
$u=$_SESSION['user_name'];
if(!isset($_SESSION['studentloggedin']) || $_SESSION['studentloggedin']!=true){
    header('location:studentlogin.php');
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
    if(isset($_POST['date1']) && isset($_POST['date2'])){
        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];
        $sql = "SELECT distinct attendance_records.name,student.user,student.father,student.address,student.phone,student.email, attendance_records.roll_number, attendance_records.date, attendance_records.semester, attendance_records.subject, attendance_records.attendance_status FROM student, attendance_records where student.user='$u' && student.roll_number=attendance_records.roll_number && date between  '$date1' and '$date2'";
     }
     else
     $sql="SELECT distinct attendance_records.name,student.user,student.father,student.address,student.phone,student.email, attendance_records.roll_number, attendance_records.date, attendance_records.semester, attendance_records.subject, attendance_records.attendance_status FROM student, attendance_records where student.user='$u' && student.roll_number=attendance_records.roll_number";
     $result=mysqli_query($con,$sql);
     //echo $sql;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<?php
?>
<div class="form-box">
<form method="post">
<input type="date" id="date1" value="date1" name="date1"/>
<input type="date" id="date2"  name="date2"/>
<input type="submit" name="search" id="submit1" value="search">
<table>
        <tr><th>Student Name</th>
        <th>Roll Number</th>
        <th>Date</th>
        <th>Semester</th>
        <th>Subject</th>
        <th>Attendance Status</th>
        </tr>
        <header>
        <nav>           
            <ul class="nav_links">


                <li><a href="studenthome.php">BACK</a></li>   
                <li><h1><?php echo "Welcome ".$u;?></h1></li>                         
            </ul>
        </nav>
        <a class="cta" href="logout.php"><button>LOG OUT</button></a>
    </header>
      <?php  
        while($row=mysqli_fetch_array($result)){
        ?>
 
        <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['roll_number']; ?></td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['semester']; ?></td>
        <td><?php echo $row['subject']; ?></td>
        <td><?php echo $row['attendance_status']; ?></td>
        </tr>
        <?php
        }
    }
        ?>
        </table>
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
    color:#edf0f1;
    text-decoration: none;
}
header{
    border:none;
    height:60px;
    width:1535px;
    background:linear-gradient(rgba(68,170,255,0.1),rgba(17,175,235,0.3));
    display: flex;
    top:0;
    position:absolute;
        justify-content: space-between;
    align-items: center;
    padding: 30px 10%;
}
h1{
    margin-left:240px;
}
.nav_links{
    list-style: none;
}
.nav_links li{
display: inline-block;
padding: 50px 50px;
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
    transition: all 0.3s ease 0s;
}
button:hover{
    background: turquoise; 
}
#submit1
    {
        border: none;
        background:linear-gradient(rgba(68,170,255,0.5),rgba(17,175,218,0.5));
        font-size:20px;
        font-weight:550;
        color:white;
        border-radius: 8px;
        position:absolute;
        top: 25%;
        left: 35%;
        transform: translate(490%, -235%);
        padding:10.2px 10.2px;
    }
    #submit1:hover
    {
        cursor: pointer;
        background:linear-gradient(#0162c8,#55e7fc);
        color:brown;
        padding: 10.3px;
    }
.a{
    left: 10px;
    transform:translate(75%,50%);
}
.a1{
    left: 10px;
    transform:translate(-10%,-200%);
}
body {
        margin: 0px;
        padding: 0px;
        background-image: url("https://images.pexels.com/photos/2341830/pexels-photo-2341830.jpeg");
        background-size: cover;
        background-position: initial;
        font-family: "Times New Roman", Times, serif;
        color:navy;
        font-size:35px;
        text-align:center;
        box-sizing:border-box;
    }
    .form-box input[type="date"]
    {
        border: none;
        background:linear-gradient(rgba(68,170,255,0.5),rgba(17,175,218,0.5));
        font-size:20px;
        font-weight:500;
        color:white;
        border-radius: 8px;
        margin-right:30px;
        padding:10px 10px;
        top: 88%;
        left: 50%;
        transform: translate(-30%, 165%);
    }
    .form-box input[type="date"]:hover
    {
        cursor: pointer;
        background:linear-gradient(#0162c8,#55e7fc);
        color:brown;
        padding:10.2px 10.2px;
    }
   
    #mybtn{
        left:10%;
        top:0%;
        transform:translate(50%,400%);
        background: linear-gradient(rgba(68,170,255,0.3),rgba(17,175,235,0.3));
        color:cornsilk;
        padding: 10px;
        text-decoration:none;
        border-radius:5px;
        position:absolute;
        display:inline-block;
    }
    #mybtn:hover{
        background:linear-gradient(#98ff98,#3eb489);
        color:steelblue;
        padding:10.2px;
    }

    table{
        top:90%;
        left:58%;
        margin-top:100px;
        position: relative(top);
        transform: translate(27%, 2%);
        box-shadow:3px 5px white;
    }
    table,th,tr,td{
        border: solid 3px white;
        color:white;
        background:rgba(0,0,60,0.05);
        width: 1000px;
        font-size: 24px;
        border-collapse: collapse;
    }
    th,tr,td{
        border:solid 2px white;
        border-collapse: collapse;
        color:blanchedalmond;
        
    }
    th{
        text-align: left;
        background-color: rgba(73, 216, 230,0.4);
        color:blanchedalmond;
    }
    table,th,td{
        border-collapse: collapse;
    }
    th,td{
        padding: 15px;
        margin:15px;
    }
</style>
</html>
