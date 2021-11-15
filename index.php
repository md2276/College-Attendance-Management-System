<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <h1>COLLEGE ATTENDANCE MANAGEMENT SYSTEM</h1>
    <div id="div1">
        <img src=" https://cdn2.vectorstock.com/i/1000x1000/61/31/software-language-programmer-avatar-vector-17866131.jpg" class="avatar1">
        <h2><a href="studentlogin.php" target="_blank" id="mybtn">STUDENT LOG IN</a></h2>
    </div>
<div id="div2">
    <img src="https://t3.ftcdn.net/jpg/02/65/44/90/360_F_265449082_G2GHNzLAUdcgYPbiSNlwG9jcFkhMAb2G.jpg" class="avatar1">
    <h2><a href="teacherlogin.php" target="_blank" id="mybtn">TEACHER LOG IN</a></h2>
</div>
<div id="div3">
    <img src="https://www.clipartkey.com/mpngs/m/172-1723322_transparent-teacher-cartoon-png-cartoon.png" class="avatar1">
    <h2><a href="adminlogin.php" target="_blank" id="mybtn">ADMIN LOG IN</a></h2>
</div>
</body>
<style type="text/css">
body {
        margin: 0;
        padding: 0;
		color:black;
        background-image: url("https://images.pexels.com/photos/46253/mt-fuji-sea-of-clouds-sunrise-46253.jpeg");
        background-size: cover;
        background-position:initial;
        font-family: sans-serif;
    }
    #mybtn{
         
        /fa b `ackground:  rgba(117, 168, 170,0.3);
        color:cornsilk;
        padding: 10px;
        font-size: 32px;;
        text-decoration:none;
        border-radius:5px;
        display:inline-block;
    }
    #mybtn + #mybtn{
        margin-bottom:25px;
    }
    #mybtn:hover{
        background:linear-gradient(90deg,#0162c8,#55e7fc);
        color:brown;
        padding:5px;
    }
    .avatar1 {
        width: 175px;
        height: 175px;
        margin-top: 20%;
        border-radius: 12%;
        position: absolute;
        top: 58px;
        left: calc(40% - 50px);
        
    }
    .avatar2 {
        width: 200px;
        height: 200px;
        border-radius: 0%;
        position: absolute;
        top: 70px;
        left: calc(35% - 50px);
        
    }
    .avatar3 {
        width: 220px;
        height: 220px;
        margin-top:0px;
        margin-right:;
        border-radius: 60%;
        position: absolute;
        top: 70px;
        left: calc(48% - 50px);
        
    }
    #div1{
        width:350px;
        height: 350px;
        margin:35px;
        border-style: solid;
        border: solid 5px;
        box-shadow: 3px 5px white;
        border-style: inset;
        border-color:white;
        text-align: center;
        color:white;
        position: absolute;
        top: 150px;
        left: calc(40% - 50px);
        margin-top:30px;
    }
    #div2{
        width:350px;
        height: 350px;
        border-style: solid;
        border: solid 5px;
        box-shadow: 3px 5px white;
        border-style: inset;
        border-color:white;
        text-align: center;
        color:white;
        position: absolute;
        top: 150px;
        right: calc(8% - 50px);
        margin-right:35px;
    }
    #div3{
        width:350px;
        height: 350px;
        margin-right:35px;
        border-style: solid;
        border: solid 5px;
        box-shadow: 3px 5px white;
        border-style: inset;
        border-color:white;
        text-align: center;
        color:white;
        position: absolute;
        top: 150px;
        left: calc(8% - 50px);
    }
    #div1 + #div2{
        margin: 35px;
    }
    #div2 + #div3{
        margin: 35px;
    }
    h1{
        border-style: solid;
        width: 1550px;
        height: 50px;
        margin : 0px;
        padding: 5px 5px;
        border: none;
        background-color: rgba(0, 191, 255, 0.5);
        text-align: center;
        color:white;
    }
</style>
</html>