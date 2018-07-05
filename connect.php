<?php
 

      $servername  = "localhost";
      $username = "root";
      $password = "root";
      $dbname = "employee";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
die("Connection failed: " . $conn->connect_error);
} 
#echo "connected successfully!";
?>
