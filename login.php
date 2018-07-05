<?php

    include('connect.php');
    if(isset($_GET['action']) && !empty($_GET['action'])){
        $action = $_GET['action'];

        if($action != "" && $action == "logout"){
         // Initialize the session.
          // If you are using session_name("something"), don't forget it now!
          session_start();

          // Unset all of the session variables.
          $_SESSION = array();
          // Finally, destroy the session.
           session_destroy();

          echo "loggedout Successfully";
        }
    }
session_start();


   if (isset($_POST) && !empty($_POST)){
          $username = $_POST['username'];
          $password = $_POST['pass'];

      if($username == "" || $password == "") {
        echo "Either username or password field is empty.";
        echo "<br/>";
        echo "<a href='form1.php'>Go back</a>";
    } else {
        $result = mysqli_query($conn, "SELECT * FROM registration WHERE username='$username' AND password=md5('$password')")
        or die("Could not execute the select query.");
        
        $row = mysqli_fetch_assoc($result);
        
        if(is_array($row) && !empty($row)) {
            $validuser = $row['username'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['image'] =  '<img  src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" style="height:50px;width:80px;" alt="25"/>';
        } else {
            echo "Invalid username or password.";
            echo "<br/>";
            echo "<a href='login.php'>Go back</a>";
        }
 
        if(isset($_SESSION['valid'])) {
            header('Location: frontpage.php');            
        }
    }
} else {
?>





<!DOCTYPE html>
  <head>
   <style type="text/css">
     
      h2{
    text-align: center;
  }
    #demo
      {
        width: 300px; height: 300px; margin: 0 auto;
      }

    .button1{
        justify-content: center;
    }


   </style>

   </head>
   <body>
    <div id="demo">
      <form action="" method="post">
        <h2>User Login</h2>
        <html>

          <table>
          <tr>
            <td>User Name :</td>
            <td>
              <input type="text" name="username">
            </td>
            <br>
          </tr>
          <tr>
            <td>Password :</td>
            <td>
              <input type="Password" name="pass">
            </td>
            <br>
          </tr>
             <tr>
                <td>
                  <input type="submit" value="Login">
                  </td>
                </tr>
                  <br>
                <tr>
                 <td>
                   <a href="newRegister.php">New user</a>
                   </td>
                 </tr>

             </table>
      
                </form>
                </div>
                <?php
                 }
                 ?>
               </body>
 
            </html>


            