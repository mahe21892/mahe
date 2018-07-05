<?php session_start(); ?>
<html>
<head>
    <title>Homepage</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
 
<body>
    <div id="header">
        Welcome to my page!
    </div>
    <?php
    if(isset($_SESSION['valid'])) {            
        include("connect.php");                    
        $result = mysqli_query($conn, "SELECT * FROM registration");
    ?>                
        Welcome <?php echo $_SESSION['valid'] ?> ! <a href='logout.php'>Logout</a><br/>
        <br/>
        <a href='frontpage.php'>Employee details</a>
        <br/><br/>
    <?php    
    } else {
        echo "You must be logged in to view this page.<br/><br/>";
        echo "<a href='form1.php'>Login</a> | <a href='newRegister.php'>Register</a>";
    }
    ?>
</body>
</html>
