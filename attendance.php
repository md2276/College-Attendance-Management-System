<?php
    error_reporting(0);
    session_start();
    $u=$_SESSION['user_name'];
if(!isset($_SESSION['teacherloggedin']) || $_SESSION['teacherloggedin']!=true){
    header('location:teacherlogin.php');
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
  if(isset($_POST['sem']) && isset($_POST['subject'])){
        $searchKey = $_POST['sem'];
        $searchKey1 = $_POST['subject'];
        $sql = "SELECT distinct `course`.student_name,`course`.roll_number,`course`.semester,`academics`.subject FROM `course`,`academics` WHERE `academics`.`semester`=`course`.`semester` && `academics`.`semester` LIKE '%$searchKey%' && `academics`.`subject` LIKE '%$searchKey1%'";
     }
     else
     $sql="SELECT distinct `course`.student_name,`course`.roll_number,`course`.semester,`academics`.subject FROM `course`,`academics` WHERE `academics`.`semester`=`course`.`semester`";
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
<header>
        <nav>           
            <ul class="nav_links">

                
                <li><a href="teacherhome.php">BACK</a></li> 
                <li><h1>ADD ATTENDANCE</h1></li>  
                <li><a  href="teacherview.php">VIEW ATTENDANCE</a></li>                         
            </ul>
        </nav>
        <a class="cta" href="logout.php"><button>LOG OUT</button></a>
    </header>  
        <div class="form-box">
        <form action="#" method="POST">
        <input type="date" id="date"  name="date"/>
        <input type="text" name="sem" placeholder="Search By Semester" value=<?php echo @$_POST['sem']; ?> >        
        <input type="text" name="subject" placeholder="Enter the subject" value=<?php echo $searchKey1; ?>>    
        <div class="submit1"><input type="submit" name="search" id="submit1" value="search"></div>
        <table>
        <tr><th>Serial Number</th>
        <th>Student Name</th>
        <th>Roll Number</th>
        <th>Semester</th>
        <th>subject</th>
        <th>Attendance Status</th>
        </tr>
        <?php
        $counter=0;
        $serialnumber=0;
        $counter=0;
        while($row=mysqli_fetch_array($result)){
            $serialnumber++;   
        ?>

        <tr>
        <td><?php echo $serialnumber; ?></td>
        <td><?php echo $row['student_name']; ?>
        <input type="hidden" value="<?php echo $row['student_name'];?>" name="student_name[]"></td>
        <td><?php echo $row['roll_number']; ?>
        <input type="hidden" value="<?php echo $row['roll_number'];?>" name="roll_number[]"></td>
        <td><?php echo $row['semester']; ?>
        <input type="hidden" value="<?php echo $row['semester'];?>" name="semester[]"></td>
        <td><?php echo $row['subject']; ?>
        <input type="hidden" value="<?php echo $row['subject']?>" name="subject[]"></td>
        <td>
            <div class="radio-group">
             <label class="radio">
             <input type="radio" name="attendance_status[<?php echo $counter;?>]" value="Present"><p>Present</p>
             <span></span>
             </label>
             <label class="radio">
            <input type="radio" name="attendance_status[<?php echo $counter;?>]" value="Absent"><p>Absent</p>
            <span></span>
            </label>
            </div>
        </td>
        </tr>
        <?php
        $counter++;
        }
        ?>
        </table>
        <input type="submit" name="submit" id="submit" value="submit">
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
    height:30px;
    width:1535px;
    background:linear-gradient(navy,steelblue);
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
padding: 0px 50px;
}
.nav_links li a{
    transition: all 0.3s ease 0s;
}
.nav_links li a:hover{
    color:skyblue;
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
.danger{
        color:red;
        font-size: 18px;
       padding: 10px;
       top: -80%;
        left: 0%;
        transform: translate(7%, 500%);
    }
    .success{
       color:green;
       
       font-size: 18px;
       padding: 10px;
       top:-100%;
       top: -80%;
        left: 0%;
        transform: translate(7%, 500%);
    }
    
    table{
        top:90%;
        left:58%;
        margin-top:100px;
        position: relative(top);
        transform: translate(13%, 2%);
        box-shadow:3px 5px white;
    }
    table,th,tr,td{
        top:90%;
        color:blanchedalmond;
        width: 1200px;
        
        font-size: 16px;
        padding: 8px 10px;
        border-collapse: collapse;
    }
    th,tr,td{
        border:solid 3px rgba(255,255,255,1);
        color:steelblue;
    }
    th{
        text-align: left;
        background-color:blanchedalmond;
        color:teal;
        font-size:18px;
        padding:15px 15px;
        font-weight:600px;
    }
    table,th,td{
        border-collapse: collapse;
    }
    th,td{
        margin:8px;
    }
    body{
       background-image:url("https://images.unsplash.com/photo-1499988921418-b7df40ff03f9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8");
        background-size: cover;
        background-position: center;
        font-family: sans-serif;
        padding:0;
        margin:0;
    }
    h{
        border:none;
        margin:0px;
        padding:10px;
        height:40px;
        background-color: rgba(0,0,60,0.2);
        color:white;
        text-align: center;
    } 
    h2{
        border:none;
        margin-top:0px;
        padding:10px;
        font-size:20px;
        height:22px;
        background-color: rgba(150,0,0,0.2);
        color:white;
        text-align: center;
    }  
    .form-box input[type="submit"]
    {
        border: none;
        background:linear-gradient(#0162c8,#55e7fc);
        font-size:22px;
        font-weight:650;
        color:white;
        border-radius: 8px;
        position: relative(top);
        top: 88%;
        left: 20%;
        transform: translate(650%, 49%);
        padding:16px 16px;

    }
    .form-box input[type="submit"]:hover
    {
        cursor: pointer;
        background:steelblue;
        color:blanchedalmond;
        border:
    }
    .submit1
    {
        top:50%;
        transform: translate(15%, 0%);
    }
    #submit1
    {
        border: none;
        background-color:linear-gradient(#0162c8,#55e7fc);
        font-size:20px;
        font-weight:500;
        color:white;
        border-radius: 8px;
        position:absolute;
        top: 88%;
        left: 20%;
        transform: translate(659%, 108%);
        padding:9px 9px;
        
    }
    #submit1:hover
    {
        cursor: pointer;
        background:linear-gradient(navy,steelblue);
        color:blanchedalmond;
        padding: 8.4px;
    }
    
    .form-box input[type="date"]
    {
        border: solid 1px white;
        background:rgba(255,235,205,0.5);
        font-size:20px;
        font-weight:400;
        color:teal;
        border-radius: 8px;
        padding:6.8px 2px;top: 88%;
        left: 50%;
        transform: translate(182%, 195%);
    }
    .form-box input[type="date"]:hover
    {
        cursor: pointer;
        background:linear-gradient(#0162c8,#55e7fc);
        color:brown;
        padding:7px 3px;
    }
    .form-box input[type="text"]
    {
        border: solid 1px white;
        background:rgba(255,235,205,0.5);
        font-size:18px;
        text-align:center;
        color:teal;
        width:190px;

        margin-right:30px;
        border-radius: 8px;
        padding:10px 10px;
        top: 95%;
        left: 50%;
        transform: translate(205%, 200%);
    }
    
    .s{
        font-size:25px;
        font-weight:bold;
        padding 10px 10px;
        color:navy;
        left: 50%;
        transform: translate(35%, -140%);
    }
    p{
        font-size:20px;
        font-weight:500;
        color:#167D7F;
        margin-left: 20px;
        margin-top: -10px;
        margin-bottom: -10px;
        padding-bottom: -20px;
    }
    p + p{
        
            padding: -50px;
    }
    .radio{
        font-size:10px;
        font-weight:500;
        text-transform:capitalize;
        display:inline-block;
        vertical-align:middle;
        
        margin-top: 0px;
        padding: 15px;
        position:relative;
        cursor:pointer;
    }
    .radio input[type="radio"]{
        display:none;
    }
    .radio span{
        height:20px;
        width:20px;
        border-radius:50%;
        border:5px solid blanchedalmond;
        display:block;
        position:absolute;
        left:0;
        top:7px;
    }
    .radio span:after{
        content:"";
        height:11px;
        width:11px;
        background:steelblue;
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
    #mybtn{
        
        background-color: rgba(255,235,205,0.5);
        color:teal;
        padding: 10px;
        margin-top:20px;
        margin-left:45px;
        text-decoration:none;
        border-radius:5px;
        display:inline-block;
        margin-right:1050px;
    }
    #mybtn + #mybtn{
        margin-right:50px;
    }
    #mybtn:hover{
        background:linear-gradient(90deg,#0162c8,#55e7fc);
        color:brown;
        padding:5px;
    }
</style>
</html>
<?php
if(isset($_POST['submit'])){
    
    foreach($_POST['attendance_status'] as $id=>$attendance_status){
        $student_name=$_POST['student_name'][$id];
        $roll_number=$_POST['roll_number'][$id];
        $semester=$_POST['semester'][$id];
        $subject=$_POST['subject'][$id];  
        $date=$_POST['date'];
    $sql="INSERT INTO `attendance_records` ( `name`, `roll_number`,  `semester`, `subject`, `attendance_status`, `date`) VALUES ('$student_name','$roll_number','$semester','$subject','$attendance_status','$date')";
        mysqli_query($con,$sql);
        if($con->query($sql)==true){
            $insert=true;
            echo "<script>alert('Attendace taken successfully')</script>";
        }
        else{
            echo "Error:$sql <br> $con->error";
            //echo "<script>alert('Attendance Failed')</script>";
        }
    }
}
}
?>