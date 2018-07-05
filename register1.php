<?php
 

      include('connect1.php');

      $myVariable="Regiteration successfully";

  $firstname=$_POST['name'];
  $username=$_POST['user'];
  $password=md5($_POST['pwd']);
  $confirm=md5($_POST['cpwd']);
      
      # if(isset($firstname) && isset($username) && isset($password) && isset($confirm)  && $firstname !='' && $lastname !='' && $password !='' && $confirm !='' ){
            $sql ="INSERT into registration(firstname, username, password, cpassword ) values ('$firstname', '$username', '$password', '$confirm')";
             
                             if (mysqli_query($conn, $sql)) {
                       #echo "New record created successfully";
                       echo "<script>document.location.href='form1.php'; </script>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
          #  }
            
?>