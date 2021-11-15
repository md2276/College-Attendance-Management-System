<?php
    session_start();
    $u=$_SESSION['user_name'];
    if(!isset($_SESSION['teacherloggedin']) || $_SESSION['teacherloggedin']!=true){
        header('location:teacherlogin.php');
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
    <title>TEACHER ATTENDANCE</title>
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
                <li><a href="attendance.php">BACK</a></li>
                <li><a href="teacherhome.php">TEACHER HOME</a></li>  
                <li><h1>VIEW ATTENDANCE</h1></li>          
            </ul>
        </nav>

        <a class="cta" href="logout.php"><button>LOG OUT</button></a>
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
    font-size: 18px;
    font-weight: 500;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    color:#362624;
    text-decoration: none;
}
header{
    border:none;
    height:60px;
    display: flex;
    background:rgba(255,235,205,0.06);
    justify-content: space-between;
    align-items: center;
    top:0px;
    position:absolute;
    width:1535px;
    padding: 30px 10%;
    margin-bottom:100px;
}
h1{
    margin-left:30px;
}
.nav_links{
    list-style: none;
}
.nav_links li{
display: inline-block;
padding: 0px 60px;
}
.nav_links li a{
    margin-left:-60px;
    transition: all 0.3s ease 0s;
}
.nav_links li a:hover{
    color:navy;
    
}
button{
    padding: 9px 25px;
    background: rgba(255,165,0,0.15);
    color:white;
    border:none;
    border-radius: 10px;
    cursor:pointer;
    transition: all 0.3s ease 0s;
}
button:hover{
    background:rgba(54,38,36,0.4); 
}
    #submit1
    {
        border: none;
        background-color:rgba(255,165,0,0.35);
        font-size:20px;
        font-weight:500;
        color:white;
        border-radius: 8px;
        position:absolute;
        top: 25%;
        left: 35%;
        transform: translate(525%, -270%);
        padding:8px 8px;
        box-shadow:2px 2px white;
    }
    #submit1:hover
    {
        cursor: pointer;
        background:steelblue;
        color:blanchedalmond;
        padding: 8.3px;
    }
    .form-box input[type="text"]
    {
        border: solid 1px white;
        background:rgba(255,235,205,0.5);
        font-size:18px;
        text-align:center;
        color:indigo;
        width:190px;
        border-radius: 8px;
        padding:10px 10px;
        margin-top:50px;
        margin-right:30px;
        top: 88%;
        left: 50%;
        transform: translate(255%, 80%);
    }
    table{
        top:90%;
        left:58%;
        margin-top:50px;
        position: relative;
        transform: translate(-62%, 1%);
        box-shadow:3px 5px white;
    }
    table,th,tr,td{
        border: solid 3px white;
        color:white;
        background:rgba(0,0,60,0.05);
        width: 1200px;
        font-size: 25px;
        font-weight:bold;
        border-collapse: collapse;
    }
    th,tr,td{
        border:solid 2px white;
        border-collapse: collapse;
        color:white;
        
    }
    th{
        text-align: left;
        background-color: rgba(255, 236, 205,0.6);
        color:steelblue;
    }
    table,th,td{
        border-collapse: collapse;
    }
    th,td{
        padding: 10px;
        margin:6px;
    }
    body{
        background-image:url("https://images.pexels.com/photos/4144923/pexels-photo-4144923.jpeg?cs=srgb&dl=pexels-julia-m-cameron-4144923.jpg&fm=jpg");
        background-size: cover;
        background-position: center;
        font-family: sans-serif;
        margin:0;
        padding:0;
        font-weight:bold;
    }

    #mybtn{
        background: rgba(0, 168, 170,0.3);
        color:cornsilk;
        padding: 10px;
        margin-top:0px;
        top: 30px;
        margin-left:50px;
        text-decoration:none;
        border-radius:5px;
        display:inline-block;
    }
    #mybtn:hover{
        background:linear-gradient(90deg,#0162c8,#55e7fc);
        color:brown;
        padding:11px;
    }
    span{
        margin-left:980px;
    }

</style>
</html>