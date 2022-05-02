<?php
if (session_status() === PHP_SESSION_NONE) {
   session_start();
 }
 
$db = mysqli_connect('localhost', 'root', 'vishak241007', 'lms');
if (!$db) {
   die("Connection failed: " . mysqli_connect_error());
}
 
?>
