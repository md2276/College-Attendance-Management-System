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
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Teacher</title>
</head>
<body>
<table>
        <tr><th>Image</th>
        <th>Teacher Name</th> 
        <th>Address</th>
        <th>State</th>
        <th>City</th>
        <th>Gender</th>
        <th>Dob</th>
        <th>User</th>
        <th>Email</th>
        <th>Phone</th>
        <th>University</th>
        <th>Qualification</th>
        <th>Department</th>
        </tr>
      <?php  $result=mysqli_query($con,"SELECT distinct teacher.name, teacher.qualification, teacher.user, teacher.image, teacher.address, teacher.state, teacher.city, teacher.gender, teacher.email, teacher.phone,teacher.dob, teacher.university, teacher.dept  FROM teacher ");

        while($row=mysqli_fetch_array($result)){
 
        ?>
        <header>
        <nav>
            <ul class="nav_links">
                
                <li><a href="deleteteacher.php">DELETE</a></li>
                <li><a href="adminpage.php">ADMIN PAGE</a></li>  
                <li><h1>All TEACHER</h1></li>          
            </ul>
        </nav>
        <!--a class="cta" href=''><button>ATTENDANCE</button></a-->
        <a class="cta" href="logout.php"><button>LOG OUT</button></a>
    </header>
        <tr>
        <td><?php echo "<img src='".$row['image']."' height='100px'>"; ?></td> 
        <td><?php echo $row['name']; ?></td>    
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['state']; ?></td>
        <td><?php echo $row['city']; ?></td>
        <td><?php echo $row['gender']; ?></td>
        <td><?php echo $row['dob']; ?></td>
        <td><?php echo $row['user']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['university']; ?></td>
        <td><?php echo $row['qualification']; ?></td>
        <td><?php echo $row['dept']; ?></td>
        </tr>
        <?php
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
    background: -webkit-radial-gradient(top left, rgba(248, 212, 83, 1.0), rgba(255, 93, 91, 1.0));
    background: -moz-radial-gradient(top left, rgba(248, 212, 83, 1.0), rgba(255, 93, 91, 1.0));
    background: radial-gradient(to bottom right, rgba(248, 212, 83, 1.0), rgba(255, 93, 91, 1.0));
    justify-content: space-between;
    align-items: center;
    top:0px;
    position:absolute;
    width:1535px;
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
    color:#55e7fc;
}
button{
    padding: 9px 25px;
    background: rgba(255, 176, 103,0.3);
    border:none;
    border-radius: 10px;
    cursor:pointer;
    transition: all 0.3s ease 0s;
}
button:hover{
    background: steelblue; 
    color:blanchedalmond;
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
    transform:translate(60%,100%);
}
body {
        margin: 0px;
        padding: 0px;
        background-image: url("https://images.pexels.com/photos/5706223/pexels-photo-5706223.jpeg");
        background-size: cover;
        background-position: center;
        font-family: "Times New Roman", Times, serif;
        color:white;
        font-size:35px;
        text-align:center;
        box-sizing:border-box;
    }
    #mybtn{
        left:10%;
        top:0%;
        transform:translate(60%,150%);
        background: rgba(150, 255, 255,0.5);
        color:chocolate;
        padding: 5px;
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
    h3{
        border: none;
        top:0%;
        height: 50px;
        width: 1535px;
        margin:0px;
        padding:0px;
        border: none;
        position:absolute;
        background-color: rgba(180, 250, 250,0.7);
        text-align: center;
        color:chocolate;
    }
    table{
        top:40%;
        left:50%;
        position: absolute;
        transform: translate(-50%, -43%);
        border:solid 3px white;
        box-shadow:3px 5px white;
    }
    table,th,tr,td{
        width: 1200px;
        font-size: 24px;
        padding:8px 5px;
        border-collapse: collapse;
    }
    th,tr,td{
        border:solid 2px white;
        background-color:rgba(0,0,0,0.15);
        color:navajowhite;
    }
    th{
        background:rgba(120, 120, 120,0.6);
        color:#edf0f1;
        font-size: 24px;
        font-weight:600px;
    }
    table,th,td{
        border-collapse: collapse;
    }
    th,td{

    }
</style>
</html>
