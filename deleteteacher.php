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
        <th>Teacher Name</th>
        <th>User Name</th>
        <th>Department</th>
        <th>Operation</th>
        </tr>
        <?php $result=mysqli_query($con,"SELECT  * FROM teacher");
        $serialnumber=0;
        $counter=0;
        while($row=mysqli_fetch_array($result)){
            $serialnumber++;   
        ?>
    <header>
        <nav>
            <ul class="nav_links">
                
                <li><a href="allteacher.php">BACK</a></li>
                <li><a href="adminpage.php">ADMIN PAGE</a></li>  
                <li><h1>UPDATE TEACHER DETAILS</h1></li>          
            </ul>
        </nav>
        <!--a class="cta" href=''><button>ATTENDANCE</button></a-->
        <a class="cta" href="logout.php"><button>LOG OUT</button></a>
    </header>
        </tr>
        <tr>
        <td><?php echo $serialnumber; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['user']; ?></td>
        <td><?php echo $row['dept']; ?></td>
        <td><?php echo"<a href='tdelete.php?u=$row[user]&p=$row[phone]'' id='mybtn' >Delete</a>";?></td>
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
        border-radius:6px 6px 0 0;
        overflow:hidden;
        width:1000px;
        transform: translate(-50%, -42%);
        box-shadow: 0 0 5px 5px rgba(0,0,0,0.15);
    }
    table,th,tr,td{
        
        top:48%;
        width: 800px;
        font-size: 25px;
        font-weight: 500;
        padding: 25px;
        border-collapse: collapse;
    }
    th,tr,td{
        color:#478C5C;
        font-size:25px;  
    }
    tr:nth-of-type(even){
        background:rgba(150,222,209,0.2);
    }
    tr:nth-of-type(odd){
        background:rgba(218,247,166,0.2);
    }
    tr:last-of-type{
        
        border-bottom:solid 3px #A0E7E5;
    }
    th{
        text-align: left;
        background:#A0E7E5;
        color:steelblue;
        font-weight:650px;
    }
    table,th,td{
        border-collapse: collapse;
    }
    th,td{
        padding: 10px;
        margin:10px;
    }
    body{
       background-image:url("https://images.pexels.com/photos/325185/pexels-photo-325185.jpeg");
        background-size: cover;
        background-position: initial;
        font-family: sans-serif;
        padding:0;
    }
 
    #mybtn{
        
        background-color: rgba(255,235,205,0.8);
        color:teal;
        padding: 10px;
        font-size:23px;
        margin:10px;
        text-decoration:none;
        border-radius:6px;
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
        
        background-color: rgba(0,0,60,0.4);
        color:white;
        padding: 10px;
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