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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>

    <form action="#" method="post">
        <table>
        <tr><th>Serial Number</th>
        <th>Student Name</th>
        <th>Roll Number</th>
        <th>Semester</th>
        <th colspan=2>Delete Student</th>
        </tr>
         <?php  $result=mysqli_query($con,"SELECT distinct student.name,student.roll_number,  student.user, course.semester FROM student, course WHERE student.roll_number=course.roll_number ORDER BY student.roll_number");
        $serialnumber=0;
        $counter=0;
        while($row=mysqli_fetch_array($result)){
            $serialnumber++;   
        ?>
            <header>
        <nav>
            <ul class="nav_links">
                
                <li><a href="studentall.php">BACK</a></li>
                <li><a href="adminpage.php">ADMIN PAGE</a></li>  
                <li><h1>UPDATE STUDENT DETAILS</h1></li>          
            </ul>
        </nav>
        <!--a class="cta" href=''><button>ATTENDANCE</button></a-->
        <a class="cta" href="logout.php"><button>LOG OUT</button></a>
    </header>
        <tr>
        <td><?php echo $serialnumber; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['roll_number']; ?></td>
        <td><?php echo $row['semester']; ?></td>
        <td><?php echo"<a href='delete.php?r=$row[roll_number]' id='mybtn' >Delete</a>";?></td>
        </tr>
        <?php
        $counter++;
        }
    }
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
    table{
        top:50%;
        left:50%;
        position: absolute;
        transform: translate(-50%, -55%);
        border-radius:6px 6px 0 0;
        overflow:hidden;
        box-shadow: 0 0 5px 5px rgba(0,0,0,0.2);
    }
    table,th,tr,td{
        top:48%;
        color:blanchedalmond;
        width: 1000px;
        font-size:25px;
        padding: 10px;
        border-collapse: collapse;
    }
    th,tr,td{
        font-size:en 0.9;
    }
    tr{
        
    }
    th{
        text-align: left;
        background-color:rgba(0,0,60,0.2);
        color:white;
        font-weight:600px;
        padding:14px;

    }
    table,th,td{
        border-collapse: collapse;
    }
    td{
        padding: 10px;
        margin:10px;
    }
    tr:nth-of-type(odd){
        background:rgba(100,100,100,0.4);
    }
    tr:last-of-type{   
        border-bottom:solid 3px rgba(0,50,120,0.5);
    }
    body{
       background-image:url("https://images.unsplash.com/photo-1606636660488-16a8646f012c?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1");
        background-size: cover;
        background-position: initial;
        font-family: sans-serif;
        padding:0;
    }

    #mybtn{
        
        background-color: rgba(255,235,205,0.5);
        color:teal;
        padding: 10px;
        font-size:23px;
        margin:10px;
        text-decoration:none;
        border-radius:5px;
        display:inline-block;
        margin-right:10px;
    }
    #mybtn + #mybtn{
        margin-right:50px;
    }
    #mybtn:hover{
        background:linear-gradient(90deg,#0162c8,#55e7fc);
        color:brown;
        padding:5px;
    }
    #mybtn1{
        
        background-color: steelblue;
        color:white;
        padding: 14px;
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
        background:linear-gradient(90deg,#0162c8,#55e7fc);
        color:brown;
        padding:8px;
    }
    .h{
        margin-left:1260px;
        margin-top:-80px;
    }
</style>
</html>