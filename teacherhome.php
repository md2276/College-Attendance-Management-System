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
		//echo "<script>alert('Connection success')</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Home</title>
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
      <?php  $result=mysqli_query($con,"SELECT * FROM teacher where user='$u'");

        while($row=mysqli_fetch_array($result)){
 
        ?>
                <header>
        <nav>           
            <ul class="nav_links">
                <li><?php echo"<a href='edit.php?u=$row[user]&e=$row[email]&p=$row[phone]&a=$row[address]&q=$row[qualification]'>Update</a>";?></li> 
                <li><a  href="attendance.php">ADD ATTENDANCE</a></li> 
                <li><h1>Welcome Teacher</h1></li>  
                <li><a  href="teacherview.php">VIEW ATTENDANCE</a></li>                         
            </ul>
        </nav>
        <a class="cta" href="logout.php"><button>LOG OUT</button></a>
    </header>
        <tr>
        <td><?php echo "<img src='".$row['image']."' height='200px'>"; ?></td>
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
 <?php }?>
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
    height:0.01px;
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
    margin-left:0px;    
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
    color:aqua;
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
        background-image: url("icon-internet-world-hands-businessman-network-technology-communication (1).jpg");
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
        background: rgba(50, 180, 255,0.5);
        color:blanchedalmond;
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
        top:50%;
        left:50%;
        position: absolute;
        transform: translate(-50%, -50%);
        border:solid 3px white;
        box-shadow:3px 5px white;
    }
    table,th,tr,td{
        width: 1500px;
        font-size: 24px;
        border-collapse: collapse;
    }
    th,tr,td{
        border:solid 2px white;
        background-color:rgba(0, 0, 0,0.20);
        color:aquamarine;
    }
    th{
        background:rgba(50, 180, 255,0.5);
        color:white;
        font-size:25px;
        font-weight:bold;
    }
    table,th,td{
        border-collapse: collapse;
    }
    th,td{
        padding: 6px;
        margin:0px;
    }
</style>
</html>
