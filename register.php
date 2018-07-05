<?php
 session_start(); 
 

if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}

      include('connect.php');

  $first_name=$_POST['firstname'];
  $last_name=$_POST['lastname'];
  $designation=$_POST['designation'];
  $username=$_SESSION['valid'];
      
        if(isset($first_name) && isset($last_name) && $first_name !='' && $last_name !=''){
            $sql ="INSERT into employee(firstname, lastname, designation,user_name) values ('$first_name', '$last_name', '$designation','$username')";
             
                             if (mysqli_query($conn, $sql)) {
                       #echo "New record created successfully";
                       echo "<script>document.location.href='frontpage.php'; </script>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
            
?>