<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Leave Request</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

.home{
  color : #2a9df4;
}

.logout {
  color : #2a9df4;
}

/* Style the header */
header {
  background-color: #666;
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color: white;
}

/* Container for flexboxes */
section {
  display: -webkit-flex;
  display: flex;
}

/* Style the navigation menu */
nav {
  -webkit-flex: 1;
  -ms-flex: 1;
  flex: 1;
  background: #ccc;
  padding: 20px;
}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

/* Style the content */
article {
  -webkit-flex: 3;
  -ms-flex: 3;
  flex: 3;
  background-color: #f1f1f1;
  padding: 10px;
}

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}


input[type=text], input[type=password] {
  width: 9%;
  padding: 3px 7px;
  margin: 3px 0;
  display: inline-block;
  border:  normal;
  box-sizing: border-box;
}

/* Responsive layout - makes the menu and the content (inside the section) sit on top of each other instead of next to each other */
@media (max-width: 600px) {
  section {
    -webkit-flex-direction: column;
    flex-direction: column;
  }
}
</style>
</head>
<body>
  <?php
    $reason = $_GET['reason'];
   ?>
<h2>Welcome To LMS</h2>
<header>
  <h2>Leave Management System</h2>
  <div id="quick_links">
      <ul>
      <a class="home" href="index.html">Home</a>&nbsp;&nbsp; | &nbsp;&nbsp;<a class="logout" href="login.php">Logout</a>
      </ul>
    </div>
      
</header>

<section>
  <nav>
    <ul>
      <li><a href="apply.php">Apply Leave</a></li><br>
      <li><a href="leave_request1.php">View Leave History</a></li><br>
      <li><a href="leave_request2.php">View Leave Status</a></li><br>
	   <li><a href="leave_request.php">View Profile</a></li><br>
    </ul>
  </nav>
 
  <article>
    <h1>Apply Leave</h1><br>
    <html>
    <body>

    <form method="post" action="apply_backend.php" name="MY Form">
  <div class="container">
    <label for="staff_leave" style="font-size:17px">Leave Type  : &nbsp&nbsp   </label>
    <select name="staff_leave" style="font-size:17px" id="leave_type">
      <option value="Invalid">select type</option>
      <option value="Casual Leave">Casual Leave</option>
      <option value="Sick Leave">Sick Leave</option>
      <option value="Maternity Leave">Maternity Leave</option>
      <option value="Paternity Leave">Paternity Leave</option>
      <option value="Annual Leave">Annual Leave</option>
    </select><br><br>
   <label for="s_date" style="font-size:17px">Start Date : &nbsp&nbsp&nbsp&nbsp</label>
   <input type="date" name="s_date" id="" required><br><br>
   <label for="e_date" style="font-size:17px">End Date : &nbsp&nbsp&nbsp&nbsp&nbsp</label>
   <input type="date" name="e_date" id="" required><br><br>
<br><br>
  <input type="submit" style="font-size:17px" value="Submit" name="Submit">
  

  <?php
    if ($reason == "added")
        echo "<b style='color:green'> &nbsp&nbsp&nbsp Request Submitted</b><br>";
    elseif($reason == "not")
        echo "<b style='color:red'> &nbsp&nbsp&nbsp Request Not Submitted</b><br>";
    elseif($reason == "invalid")
        echo "<b style='color:red'> &nbsp&nbsp&nbsp Invalid Leave Type</b><br>";
    elseif($reason == "invalid_number_of_days")
        echo "<b style='color:red'> &nbsp&nbsp&nbsp Number Of Remaining Days Exceeded</b><br>";
    elseif($reason == "invalid_start_date")
        echo "<b style='color:red'> &nbsp&nbsp&nbsp Cannot Apply Leave From Past Date</b><br>";
    elseif($reason == "invalid_start_and_end_date")
        echo "<b style='color:red'> &nbsp&nbsp&nbsp End Date Is Earlier Than Start Date</b><br>";
   ?> 
</section>
   </div>
    </form>   
    </body>
    
<footer>
  <p></p>
</footer>

</body>
</html>