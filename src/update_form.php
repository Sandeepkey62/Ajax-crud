<?php
  include '../db/connect.php';
 $sql="update user_tbl set name='".$_POST['name']."',address='".$_POST['address']."',email='".$_POST['email']."' where id='".$_POST['id_user']."'";
 if(mysqli_query($conn,$sql)){
 	 echo "update,updated";
 }
 else{
 	 echo "not,Not Updated".$sql.$conn->error;
 }

?>