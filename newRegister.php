<!DOCTYPE html>
 <html>
  <head>
   <style type="text/css">
     
      h2{
    text-align: center;
  }

  #aDiv
     {
     	width: 300px; height: 300px; margin: 0 auto;
     }

  </style>

   </head>
   <body>
  <script type="text/javascript">
         var check = function() {
  if (document.getElementById('pwd').value ==
    document.getElementById('cpwd').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
</script>
    <?php
    include("connect.php");
 
    if(isset($_POST['submit'])) {
        $firstname = $_POST['name'];
        $username = $_POST['user'];
        $password = $_POST['pwd'];
        $confirm = $_POST['cpwd'];
      #  $target_dir ='images/';
       # $target_file = $target_dir . basename($_FILES["myImage"]["name"]);
        $image = addslashes(file_get_contents($_FILES['myImage']['tmp_name']));
       # echo  $target_file;
        #exit();

 
        if($firstname == "" || $username == "" || $password == "" || $confirm == "") {
            echo "All fields should be filled. Either one or many fields are empty.";
            echo "<br/>";
            echo "<a href='newRegister.php'>Go back</a>";
        } else {
        	$query="INSERT INTO registration(firstname, username, password, cpassword, image) VALUES('$firstname', '$username', md5('$password'), md5('$confirm'), '$image')";
            mysqli_query($conn, $query)
            or die("Could not execute the insert query.");
            
            echo "Registration successfully";
            echo "<br/>";
            echo "<a href='login.php'>Login</a>";
        }
    } else {
?>
    <div>
      <form action="" method="post" enctype="multipart/form-data">
        <h2>User Registration</h2>
     </head>


  <div>
      <div id="aDiv">
        <table>
          <tr>
            <td>First Name :</td>
            <td>
              <input type="text" name="name"/>
            </td>
            <br>
          </tr>
          <tr>
            <td>User Name:</td>
            <td>
              <input type="text" name="user"/>
            </td>
            <br>
          </tr>
          <div>
          <tr>
            <td>Password :</td>
            <td>
              <input type="password" name="pwd" id="pwd" onkeyup="check()"/>
            </td>
            <br>
          </tr>
           <tr>
            <td>Conform Password :</td>
              <td>
              <input type="password" name="cpwd" id="cpwd" onkeyup="check()"/>
               </td>
                <br>
                <p><span id='message'></span></p>
              </tr>
              </div>
                <tr>
                  <td>
                 <input type="file" name="myImage">
                  </td>
  	              </tr>
                   <br>
               <tr>
                <td>
              <input type="submit" name="submit" value="Submit">
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
