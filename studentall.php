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
		//echo "<script>alert('Connection success')</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Student</title>
</head>
<body>
<table>
        <tr><th>Image</th>
        <th>Student Name</th>
        <th>Father Name</th>  
        <th>Address</th>
        <th>State</th>
        <th>City</th>
        <th>Roll Number</th>
        <th>Gender</th>
        <th>Dob</th>
        <th>User</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Guardian Number</th>
        <th>Semester</th>
        </tr>
      <?php  $result=mysqli_query($con,"SELECT distinct student.name, student.father, student.user, student.image, student.address, student.state, student.city, student.gender, student.email, student.phone,student.dob, student.guardian, attendance_records.roll_number, course.semester FROM student, attendance_records,course WHERE student.roll_number=attendance_records.roll_number&&attendance_records.roll_number=course.roll_number ORDER BY student.roll_number");

        while($row=mysqli_fetch_array($result)){
 
        ?>
    <header>
        <nav>
            <ul class="nav_links">
                
                <li><a href="view.php">ATTENDANCE</a></li>
                <li><a href="adminpage.php">ADMIN PAGE</a></li>  
                <li><h1>ALL STUDENT</h1></li>          
            </ul>
        </nav>
        <!--a class="cta" href=''><button>ATTENDANCE</button></a-->
        <a class="cta" href="update.php"><button>DELETE</button></a>
    </header>
        <tr>
        <td><?php echo "<img src='".$row['image']."' height='100px'>"; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['father']; ?></td>      
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['state']; ?></td>
        <td><?php echo $row['city']; ?></td>
        <td><?php echo $row['roll_number']; ?></td>
        <td><?php echo $row['gender']; ?></td>
        <td><?php echo $row['dob']; ?></td>
        <td><?php echo $row['user']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['guardian']; ?></td>
        <td><?php echo $row['semester']; ?></td>
        </tr>
        <?php
        }}
        ?>
        </table>
    </form>
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
    background:linear-gradient(rgba(68,170,255,0.1),rgba(17,175,235,0.3));
    justify-content: space-between;
    align-items: center;
    top:0px;
    position:absolute;
    width:1535px;
    padding: 30px 10%;
    margin-bottom:60px;
}
h1{
    margin-left:120px;
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
    color:#55e7fc;
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
    background:rgba(137,207,240,1); 
    color:white;
}
.a{
    left: 10px;
    transform:translate(61%,-55%);
}
.a1{
    left: 10px;
    transform:translate(-8%,100%);
}
.a2{
    left: 1px;
    transform:translate(22.8%,100%);
}
body {
        margin: 0px;
        padding: 0px;
        background-image: url("pexels-serpstat-572056.jpg");
        background-size: cover;
        background-position: initial;
        font-family: "Times New Roman", Times, serif;
        color:white;
        font-size:35px;
        text-align:center;
        box-sizing:border-box;
    }
    #mybtn{
        left:10%;
        top:0%;
        transform:translate(60%,-850%);
        background: rgba(50, 200, 250,0.3);
        color:#f5fffa;
        padding: 5px;
        margin-top:500px;
        text-decoration:none;
        border-radius:5px;
        position:absolute;
        display:inline-block;
    }
    #mybtn:hover{
        background:linear-gradient(90deg,#0162c8,#55e7fc);
        color:brown;
        padding:5px;
    }
    table{
        top:40%;
        left:50%;
        margin-top:20px;
        position: relative;
        transform: translate(-50%, 10%);
        border:solid 3px white;
        box-shadow:3px 5px white;
    }
    table,th,tr,td{
        width: 1500px;
        font-size: 24px;
        font-weight:italic;
        border-collapse: collapse;
    }
    th,tr,td{
        border:solid 2px white;
        background-color:rgba(0,0,0,0.25);
        color:blanchedalmond;
        
    }
    th{
        background:linear-gradient(rgba(68,170,255,0.3),rgba(17,175,235,0.3));
        color:blanchedalmond;
        font-size: 24px;
        font-weight:600px;
    }
    table,th,td{
        border-collapse: collapse;
    }
    th,td{
        padding: 15px 5px;
        margin:5px;
    }
</style>
</html>