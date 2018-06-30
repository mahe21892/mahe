<?php  

      include('connect.php');
     $id=$_GET['id'];


      $sql="DELETE from employee WHERE id='$id'";             
                             if (mysqli_query($conn, $sql)) {
                       #echo "Record Deleted successfully";
                           echo "<script>document.location.href='frontpage.php'; </script>";
                         }

                      else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
