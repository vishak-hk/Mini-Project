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

.home{
  color : #2a9df4;
}

.logout {
  color : #2a9df4;
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
  width: 50%;
  padding: 6px 10px;
  margin: 3px 0;
  display: inline-block;
  border:  solid black;
  box-sizing: border-box;
}

table, th, td {
  border: 1px solid black;
  text-align: center;
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

<h2>Welcome To LMS</h2>
<!-- <p>In this example, we have created a header, two columns/boxes and a footer. On smaller screens, the columns will stack on top of each other.</p>
<p>Resize the browser window to see the responsive effect.</p>
<p><strong>Note:</strong> Flexbox is not supported in Internet Explorer 10 and earlier versions.</p> -->

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
    <h1>Personal Information</h1>
    <html>
    <body>
  <!--<form name="MY Form"action="Login">
    
  <div class="container">
    <label for="staff_id"><b>Staff ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b></label>
    <input type="text" placeholder="Enter Staff ID" name="staff_id" required>
    <br><br>-->

<?php

include 'config.php';
$user_id = $_SESSION['user_id'];
$query = "SELECT name,gender,phone_no,branch,college FROM user_info WHERE user_id='$user_id'";
$data = mysqli_query($db, $query);
$total = mysqli_num_rows($data);

  if($total!=0)
  {
    while(($result = mysqli_fetch_assoc($data)))
    {
      echo "
    <li>Name  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: ".$result['name']."</li><br>  
    <li>Gender &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: ".$result['gender']."</li><br>
    <li>Phone no &nbsp : ".$result['phone_no']."</li><br>
    <li>Branch &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: ".$result['branch']."</li><br>
    <li>College &nbsp&nbsp&nbsp&nbsp&nbsp: ".$result['college']."</li><br>
    <td width=\"200px\">".$result['leave_type']."</td>
    <td width=\"200px\">".$result['start_date']."</td>
    <td width=\"200px\">".$result['end_date']."</td>
    <td width=\"200px\">".$result['days_requested']."</td>
    <td width=\"200px\">".$result['date_applied']."</td>
    <td width=\"200px\">".$result['leave_status']."</td>
    </tr>"; 
    }
  }
  else
  { 
    echo "<br><h1>&nbsp&nbsp&nbsp No Records Found </h1>";
  }




?>
    
<h1>Current Leave Balance</h1>

<!-- <h2>Bordered Table</h2>
<p>Use the CSS border property to add a border to the table.</p> -->

<table style="width:%100">
				<tr>
          <th width="200px">Leave Types</th>
					<th width="200px">Maximum Allowed Leaves</th>
					<th width="200px">Leaves Taken</th>
					<th width="200px">Remaining Leaves</th>
				</tr>
			

<?php

include 'config.php';
$user_id = $_SESSION['user_id'];
$reason = $_GET['reason'];
$query = "SELECT * FROM leave_types";
$data = mysqli_query($db, $query);
$total = mysqli_num_rows($data);

  if($total!=0)
  {
    //<td width=\"150px\"><a href = 'delete.php?reason=$result[name]'><button><img src='images/wrong.png' width='10px'></button></td>
    while(($result = mysqli_fetch_assoc($data)))
    {
      $leave_request_query ="SELECT * FROM leave_requests WHERE leave_type='".$result['leave_type']."' AND staff_id='$user_id' AND leave_status='Accepted'"; 
      $leave_request_data = mysqli_query($db, $leave_request_query);
      $num_rows = mysqli_num_rows($leave_request_data);
      $leave_type = $result['leave_type'];
      $no_of_days = $result['no_of_days'];
      if($num_rows != 0){
        $days_requested = 0;
        while ($leave_request_result = mysqli_fetch_assoc($leave_request_data))
        {
          $days_requested += $leave_request_result['days_requested'];
        }
      }
      else{
        $days_requested = 0;
      }
      
      $remaining = $no_of_days-$days_requested;
      echo "
        <tr>
          <td width=\"200px\">".$leave_type."</td>
          <td width=\"200px\">".$no_of_days."</td>
          <td width=\"200px\">".$days_requested."</td>
          <td width=\"200px\">".$remaining."</td>
        </tr>";
  
      }
  }
  else
  { 
    echo "<br><h1>&nbsp&nbsp&nbsp No Records Found </h1>";
  }
 
?>
</table><br><br>

</section>
</form>
<footer>
  <p></p>
</footer>
</body>
</html>