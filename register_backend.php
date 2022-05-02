<?php
 include 'config.php';
	if (isset($_POST['reg_user'])) {
	$name = mysqli_real_escape_string($db, $_POST['name']);   
   $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
   $password = mysqli_real_escape_string($db, $_POST['password']); 
   $phone = mysqli_real_escape_string($db, $_POST['phone']);
   $gender = mysqli_real_escape_string($db, $_POST['gender']);
   $branch = mysqli_real_escape_string($db, $_POST['branch']);
   $college = mysqli_real_escape_string($db, $_POST['college']);
   $user_type = mysqli_real_escape_string($db, $_POST['user_type']);

   // Attempt insert query execution
   $sql = "INSERT INTO user_info
values ('$name','$user_id','$gender ','$phone','$branch','$college','$password','$user_type')";
   if(mysqli_query($db, $sql)){
      header("location: register.php?reason=successful");
   } else{
      header("location: register.php?reason=unsuccessful"); 
   }
   }
 
?>


