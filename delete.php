<?php
include 'config.php';

$name=$_POST['name'];
$query="DELETE FROM user_info WHERE name='$name'";

if(mysqli_query($db,$query))
{
    header('location: delete_staff.php?reason=added');   
}
else {
    header('location: delete_staff.php?reason=not');    
}
?>
