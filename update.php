<!DOCTYPE html>
 <html>
  <head>
   <style type="text/css">
     
      h2{
    text-align: center;
  }
    #demo{
    background-color: block;
    border: 25px block;
    padding: 25px;
    margin: 25px;
    border: solid;
    height: 700px;
  }
   </style>
   </head>
   <body>
            <?php session_start(); ?>
 
           <?php
            if(!isset($_SESSION['valid'])) {
               header('Location: login.php');
            }
        ?>

   <?php

         include('connect.php');
     
         $id= $_GET["id"];
        $page=$_GET["page"];

        $results=mysqli_query($conn, "SELECT * FROM employee WHERE id='$id'");

           while ($row = mysqli_fetch_array($results)){
            $firstname=$row['firstname'];
            $lastname=$row['lastname'];
            $designation=$row['designation'];
           }





        # if( isset($_GET["firstname"]) && isset($_GET["lastname"] ) && isset($_GET["designation"])){
       
     ?>
    <div id="demo">
      <form action="update1.php" method="post">
        <h2>Update Table</h2>
     First Name:<input type="text" name="firstname" value="<?php echo $firstname;?>"/><br>
     Last Name:<input type="text" name="lastname" value="<?php echo $lastname;?>"/><br>
     Designation:
                <select name="designation">
                 <option <?php if ($designation == "Software Developer" ) echo 'selected' ; ?> value="Software Developer">Software Developer</option>
                 <option <?php if ($designation == "Software trainee" ) echo 'selected' ; ?>  value="Software trainee">Software trainee</option>
                 <option  <?php if ($designation == "Senior software developer" ) echo 'selected' ; ?>  value="Senior software developer">Senior software developer</option>
                 </select>

  <br>

  <input type="hidden" name="id" value="<?php echo $id;?>"/>
  <input type="hidden" name="page" value="<?php echo $page;?>"/>
      <input type="submit" value="Update">
      
                </form>
                </div>
               </body>
 
            </html>


 

 

      



