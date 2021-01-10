<?php
  include '../db/connect.php';
 $sql="select * from user_tbl where id='".$_POST['id']."'";
  $result=mysqli_query($conn,$sql);
  $name;
  $email;
  $address;
  while($row=mysqli_fetch_assoc($result)){
  	$id=$row['id'];
  	  $name= $row['name'];
  	   $address= $row['address'];
  	    $email= $row['email'];
  }
?>
<div>
  <form id="FormIds" method="post">
  <span id="san"></span>
    <label>Name:</label>
    <input type="text" name="id_user" hidden=""  id="id_user" 
    class="form-control" value="<?php echo $id ?>">
    <input type="text" name="name" id="name" 
    class="form-control" value="<?php echo $name ?>">
    <label>Address</label>
     <input type="text" name="address" id="address" 
     class="form-control" value="<?php echo $address ?>">
     <label>Email</label>
      <input type="text" name="email" name="email"
       class="form-control" value="<?php echo $email ?>">
      <input type="submit" class="btn btn-success my-2" name="submits" id="submit" value="update" onclick="updates_form('FormIds')">
  </form>
</div>