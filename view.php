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
    if(isset($_POST['sem']) && isset($_POST['subject'])){
        $searchKey = $_POST['sem'];
        $searchKey1 = $_POST['subject'];
        $sql = "SELECT distinct date,name,roll_number,semester,subject,attendance_status FROM attendance_records WHERE semester LIKE '%$searchKey%' && subject LIKE '%$searchKey1%'";
     }
     else
     $sql="SELECT distinct * FROM attendance_records";
     $result = mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATTENDANCE</title>
</head>
<body>
    <form action="" method="post">
    <div class="form-box">
    <input type="text" name="sem" placeholder="Search By Semester" value=<?php echo @$_POST['sem']; ?> >        
        <input type="text" name="subject" placeholder="Enter the subject" value=<?php echo @$_POST['subject']; ?>>    
    <input type="submit" name="search" id="submit1" value="search">
        
        <table>
        <tr>
        <th>Date</th>
        <th>Student Name</th>
        <th>Roll Number</th>
        <th>Semester</th>
        <th>Subject</th>
        <th>Attendance Status</th>
        </tr>
        <?php  
        while($row=mysqli_fetch_array($result)){   
        ?>
        <header>
        <nav>
            <ul class="nav_links">
                <li><a href="studentall.php">BACK</a></li>
                <li><a href="adminpage.php">ADMIN PAGE</a></li>  
                <li><h1>VIEW ATTENDANCE</h1></li>          
            </ul>
        </nav>
        <!--a class="cta" href=''><button>ATTENDANCE</button></a-->
        <a class="cta" href="export.php"><button>PRINT RECORDS</button></a>
    </header>
        <tr>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['roll_number']; ?></td>
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
    font-size: 16px;
    font-weight: 500;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    color:#edf0f1;
    text-decoration: none;
}
header{
    border:none;
    height:60px;
    display: flex;
    background:radial-gradient(rgba(68,170,255,0.7),rgba(17,175,235,0.8),rgba(73, 216, 230,1));
    justify-content: space-between;
    align-items: center;
    top:0px;
    position:absolute;
    width:1535px;
    padding: 30px 10%;
    margin-bottom:100px;
}
h1{
    margin-left:80px;
}
.nav_links{
    list-style: none;
}
.nav_links li{
display: inline-block;
padding: 0px 50px;
}
.nav_links li a{
    transition: all 0.3s ease 0s;
}
.nav_links li a:hover{
    color:rgba(0,0,60,1);
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
    background:rgba(0,0,60,0.6); 
}
    #submit1
    {
        border: none;
        background-color:rgba(80,205,255,1);
        font-size:20px;
        font-weight:500;
        color:white;
        border-radius: 8px;
        position:absolute;
        top: 25%;
        left: 35%;
        transform: translate(525%, -255%);
        padding:8px 8px;
        box-shadow:2px 2px white;
    }
    #submit1:hover
    {
        cursor: pointer;
        background:linear-gradient(90deg,#0162c8,#55e7fc);
        color:brown;
        padding: 8.3px;
    }
    .form-box input[type="text"]
    {
        border: solid 1px white;
        background:rgba(255,235,205,0.5);
        font-size:18px;
        text-align:center;
        color:teal;
        width:190px;
        border-radius: 8px;
        padding:10px 10px;
        margin-right:30px;
        margin-top:50px;
        margin-bo
        top: 88%;
        left: 50%;
        transform: translate(255%, 75%);
    }
    table{
        margin-top:50px;
        top:90%;
        left:58%;
        position: relative(top);
        transform: translate(27%, 0%);
        box-shadow:3px 5px white;
    }
    table,th,tr,td{
        border: solid 3px white;
        color:white;
        background:rgba(0,0,60,0.05);
        width: 1000px;
        font-size: 15px;
        border-collapse: collapse;
    }
    th,tr,td{
        border:solid 2px white;
        border-collapse: collapse;
        color:white;
        
    }
    th{
        text-align: left;
        background-color: rgb(73, 216, 230);
    }
    table,th,td{
        border-collapse: collapse;
    }
    th,td{
        padding: 15px;
        margin:15px;
    }
    body{
        background:linear-gradient(rgba(68,170,255,1),rgba(17,175,218,1));
        background-size: cover;
        background-position: initial;
        font-family: sans-serif;
        margin:0;
        padding:0;
    }
 
    #mybtn{
        background: rgba(0, 168, 170,0.3);
        color:cornsilk;
        padding: 10px;
        margin-top:0px;
        top: 30px;
        margin-left:50px;
        margin-right:480px;
        text-decoration:none;
        border-radius:5px;
        display:inline-block;
    }
    #mybtn:hover{
        background:linear-gradient(90deg,#0162c8,#55e7fc);
        color:brown;
        padding:11px;
    }
    #mybtn1{
        background: rgba(0, 168, 170,0.3);
        color:cornsilk;
        padding: 10px;
        margin-top:0px;
        top: 10px;
        transform:translate(0%,-100%);
        margin-left:1270px;
        text-decoration:none;
        border-radius:5px;
        display:inline-block;
    }
    #mybtn1:hover{
        background:linear-gradient(90deg,#0162c8,#55e7fc);
        color:brown;
        padding:11px;
    }

</style>
</html>