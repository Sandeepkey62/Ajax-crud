<?php
  include '../db/connect.php';
$sql="delete from user_tbl where id='".$_POST['dele']."'";
   if(mysqli_query($conn,$sql))
   {
   	echo "Delete,Record has been successfully deleted";
   }else{ 	
   	 echo "n delete".$sql.$conn->error;
   }

?>