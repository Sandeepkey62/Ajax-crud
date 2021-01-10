<?php
  include '../db/connect.php';
    $sql="SELECT email from user_tbl where email='".$_POST['email']."'";
   $result=mysqli_query($conn,$sql);
   $row=mysqli_num_rows($result);
     if(($_POST['mode']==='login'))
     {
   if($row<1)
  {
     if(empty($_POST['name'])){
       	 echo "name,Please fill your name";
       	 return;
       }
   	 	 $email=$_POST['email'];
        $sql="INSERT INTO  user_tbl(name,address,email)
        values('".$_POST['name']."','".$_POST['address']."','$email')";
          if(mysqli_query($conn,$sql)){
          	 echo "success,success";
          }
          else{
          	 echo "Not,not inserted"; 
          }
      }
      else{
           echo "email,email is already"; 
      }
     }
     else{
     	 echo "something went wrong";
     }
?>