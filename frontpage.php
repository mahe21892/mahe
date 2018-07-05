<!DOCTYPE html>
  <html>
   <head>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
#content{
    background-color: block;
    border: 25px block;
    padding: 25px;
    margin: 25px;
    border: solid;
    height: 500px;
  }

  h2{
        text-align: center;
    font-style: oblique;
    font-size: 34px;
    color: #31708f;
  }

   .button {
    width: 115px;
    height: 25px;
    background: #4E9CAF;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
    color: white;
    font-weight: bold;
}

   .logout{
    position: absolute;
    top: 38px;
    right: 31px;
    font-size: 18px;
  }

  .image{
    position: absolute;
    top: 28px;
    right: 138px;
    font-size: 18px;
  }
}
</style>

<script>


  function myFunction() {
      var select=false;
    var radioButtons = document.getElementsByName('radiobtn');
       var curpage=document.getElementById("currentpage").value;
    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked) {
          var empId = radioButtons[i].value;
            select=true;
        }
      }
          if(select)
            document.location.href='update.php?page='+curpage+'& id='+empId;
            else
               alert("Please select the any one record");
      }


function myFunction1() {
  var select=false;
 var radioButtons = document.getElementsByName('radiobtn');
    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked) {
          var empId = radioButtons[i].value;
          select = true;
        }
    }

      if(select)
        document.location.href='delete.php?id='+empId;
      else
         alert("Please select the any one record");

}

 </script>
       


</head>
<body>
    <?php session_start(); ?>
 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}

?>

  
  <?php




    // PAGINATION VARIABLES
    // page is the current page, if there's nothing set, default is page 1
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    // set records or rows of data per page
    $records_per_page = 5;

    // calculate for the query LIMIT clause
    $from_record_num = ($records_per_page * $page) - $records_per_page;
  ?>
  
<div id="content">

<h2> Employee Details</h2>
   <div style="padding-bottom:25px"> 

        <div class="image">
          <?php echo $_SESSION['image'];?>
        </div>

        <div class="logout">
           <a  class="button" href="login.php?action=logout">logout</a>
         </div>
         <a  class="button" href="create.php">Create</a>
         <a class="button" href="javascript:myFunction()">EDIT</a>
         <a class="button" href="javascript:myFunction1()">Delete</a>
          <a  class="button" href="generatePDF.php" target="_blank">Report</a>

       
      </div>
      <input type="hidden" id="currentpage" value="<?php echo $page;?>"/>
 <div>
     <?php include('connect.php'); ?>
   <?php $results = mysqli_query($conn, "SELECT * FROM employee WHERE user_name='".$_SESSION['valid'] ."'limit $from_record_num,$records_per_page "); ?>
    <table class="table">
     <thead>
       <tr>
        <th> </th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Designation</th>
        </tr>
      </thead>

      <?php 
    if(!empty($results)){
      while ($row = mysqli_fetch_array($results)) { ?>
      <tr id="<?php echo "row".$row['id'];?>">
        <td><input type="radio" name="radiobtn" value="<?php echo $row['id'];?>"></td>
        <td><?php echo $row['firstname']; ?></td>
        <td><?php echo $row['lastname']; ?></td>
        <td><?php echo $row['designation']; ?></td>
    </tr>
  <?php } }?>
      </table>

      <?php 
        
        $result=mysqli_query($conn,"SELECT count(*) as total_rows from employee WHERE user_name='".$_SESSION['valid'] ."'");
        $data=mysqli_fetch_assoc($result);
        $total_rows =$data['total_rows'];

        $page_url="frontpage.php?";
        echo "<ul class='pagination pull-left margin-zero mt0'>";
         
        $total_pages = ceil($total_rows / $records_per_page);
         
           for ($x=1; $x<=$total_pages; $x++) {
         
                // current page
                if ($x == $page) {
                    echo "<li class='active'>";
                        echo "<a href='javascript::void();'>{$x}</a>";
                    echo "</li>";
                }
         
                // not current page
                else {
                    echo "<li>";
                        echo " <a href='{$page_url}page={$x}'>{$x}</a> ";
                    echo "</li>";
                }
            
        }
         
        // last page button will be here
         
        echo "</ul>";


       ?>
</div>
</body>
</head>
</html>

