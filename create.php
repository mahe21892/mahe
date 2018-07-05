<?php session_start(); ?>
 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}


?>

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
     <script type="text/javascript">
       function validation(){
            var firstname=document.getElementById("f_name").value;
             var lastname=document.getElementById("l_name").value;
            
             if (firstname==null || firstname==""){  
                   alert("First Name can't be blank");  
                     return false;  
                }
            else if(lastname==null || lastname==""){  
            alert("Last Name Can't be blank");  
             return false;  
              }
            return true;    
       }
      
      function get_values(input_id){
        var input = document.getElementById(input_id).value;
           document.write(input);
      }

     </script>
   </head>
   <body>
    <div id="demo">
      <form action=register.php method="post" onsubmit="return validation()" >
        <h2>Create Table</h2>
     First Name:<input type="text" name="firstname" id="f_name" /><br>
     Last Name:<input type="text" name="lastname" id="l_name" /><br>
     Designation:
                <select name="designation" id="desig">
                 <option value="Software Developer">Software Developer</option>
                 <option value="Software trainee">Software trainee</option>
                 <option value="Senior software developer">Senior software developer</option>
                 </select>
                 <br>
      <input type="submit" value="Create" onclick="get('id')">
      <a clas"button" href="frontpage.php">Cancel</a>
      
                </form>
                </div>
               </body>
 
            </html>

      



