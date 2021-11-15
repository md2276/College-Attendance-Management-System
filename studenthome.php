<?php
    session_start();
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
    <title>Student Home</title>
</head>
<body>

<?php
session_start();
$u=$_SESSION['user_name'];
if(!isset($_SESSION['studentloggedin']) || $_SESSION['studentloggedin']!=true){
    header('location:studentlogin.php');
}
else{
?>

<table>
        <tr>
        <th>Image</th>
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
      <?php  $result=mysqli_query($con,"SELECT distinct student.name, student.father, student.user, student.image, student.address, student.state, student.city, student.gender, student.email, student.phone,student.dob, student.guardian, course.roll_number, course.semester FROM student,course where student.user='$u' && student.roll_number=course.roll_number");

        while($row=mysqli_fetch_array($result)){
        $count=0;
        ?>
        <header>
        <nav>
            <ul class="nav_links">
                
                <li><?php echo"<a href='editstudent.php?u=$row[user]&f=$row[father]&a=$row[address]&p=$row[phone]&e=$row[email]'>UPDATE</a>";?></li>
                <li><a href="studentattendance.php">ATTENDANCE</a></li>  
                <li><h1><?php echo "Welcome ".$u;?></h1></li>          
            </ul>
        </nav>
        <!--a class="cta" href=''><button>ATTENDANCE</button></a-->
        <a class="cta" href="logout.php"><button>LOG OUT</button></a>
    </header>
        <div class="a2"></div>
        <div class="a"></div>
        <tr>
        <td><?php echo "<img src='".$row['image']."' height='200px'>"; ?></td>
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
        $count++;
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
header{
    border:none;
    height:60px;
    backgroun: rgba(248, 212, 83, 1.0);
    backgroun: rgba(247, 202, 201,1);
background: -webkit-radial-gradient(top left, rgba(248, 212, 83, 1.0), rgba(255, 93, 91, 1.0));
background: -moz-radial-gradient(top left, rgba(248, 212, 83, 1.0), rgba(255, 93, 91, 1.0));
background: radial-gradient(to bottom right, rgba(248, 212, 83, 1.0), rgba(255, 93, 91, 1.0));
    
}

li,a,button{
    font-size: 16px;
    font-weight: 500;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    color:#edf0f1;
    text-decoration: none;
}
header{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 30px 10%;
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
    color:#0088a9;
}
button{
    padding: 9px 25px;
    background-color: rgba(255, 176, 103,0.3);
    border:none;
    border-radius: 10px;
    cursor:pointer;
    transition: all 0.3s ease 0s;
}
button:hover{
    background-color: rgba(79, 145, 161,0.8); 
}
.a{
    left: 10px;
    transform:translate(68%,-55%);
}
.a1{
    left: 10px;
    transform:translate(-8%,100%);
}
.a2{
    left: 10px;
    transform:translate(23%,100%);
}
body {
        margin: 0px;
        padding: 0px;
        background-image: url("https://images.pexels.com/photos/17658/pexels-photo.jpg");
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
        transform:translate(50%,-750%);
        background: rgba(247, 202, 201,0.3);
        color:crimson;
        padding: 5px;
        margin-top:500px;
        text-decoration:none;
        border-radius:5px;
        position:absolute;
        display:inline-block;
    }
    #mybtn:hover{
        background:radial-gradient(90deg,#0162c8,#55e7fc);
        color:brown;
        padding:5px;
    }
    h3{
        border: none;
        top:0%;
        height: 50px;
        width: 1535px;
        margin:0px;
        padding:0px;
        border: none;
        position:absolute;
        background-color: rgba(247, 202, 201,0.3);
        text-align: center;
        color:#C85250;
    }
    table{
        top:50%;
        left:50%;
        position: absolute;
        transform: translate(-50%, -50%);
        border:solid 3px white;
        box-shadow:3px 5px white;
    }
    table,th,tr,td{
        width: 800px;
        font-size: 22px;
        border-collapse: collapse;
    }
    th,tr,td{
        border:solid 2px white;
        background-color:rgba(247, 202, 201,0.3);
        color:crimson;
    }
    th{
        background:rgba(255, 176, 103,0.3);
        color:#C85250;
    }
    table,th,td{
        border-collapse: collapse;
    }
    th,td{
        padding: 6px;
        margin:5px;
    }
</style>
</html>
