<?php
  include '../db/connect.php';
  $sql="select * from user_tbl";
   $result=mysqli_query($conn,$sql);
   // $data=array();
      while($rows=mysqli_fetch_assoc($result)){

      	 $data[]=$rows;
      }
      // }
 echo (json_encode($data));
 

?>