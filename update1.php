<?php 
    
    include('connect.php');
      
      $firstname=$_POST['firstname'];
      $lastname=$_POST['lastname'];
      $designation=$_POST['designation'];
      $id=$_POST['id'];
      $page=$_POST['page'];

      if($firstname !='' || $lastname !=''){


                        $sql="UPDATE employee SET firstname='$firstname',lastname='$lastname',designation='$designation' WHERE id='$id'";             
                             if (mysqli_query($conn, $sql)) {
                             	header('Location: frontpage.php?page='.$page);
                           #echo "<script> document.location.href='frontpage.php?page='".$page."'; </script>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
?>