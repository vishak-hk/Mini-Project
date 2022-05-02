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
  -webkit-flex: 4;
  -ms-flex: 4;
  flex: 4;
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
  width: 40%;
  padding: 6px 10px;
  margin: 3px 0;
  display: inline-block;
  border: 1px solid #ccc;
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
    <h1>Applied Leave Status</h1><br>
  <!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  text-align: center;
}
</style>
</head>
<body>

<!-- <h2>Bordered Table</h2>
<p>Use the CSS border property to add a border to the table.</p> 


  <tr>
    <td>Casual Leave</td>
    <td>2019-10-25</td>
    <td>2019-10-28</td>
    <td>4</td>
    <td>2019-10-25</td>
    <td>pending</td>
  </tr>
  </table>-->
  
  <table >
      
<?php

include 'config.php';
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM leave_requests WHERE staff_id = '$user_id' and leave_status='Pending'";
$data = mysqli_query($db, $query);
$total = mysqli_num_rows($data);

  if($total!=0)
  {
    echo "
    <tr>
      <th width=\"200px\">Leave Types</th>
      <th width=\"200px\">Start Date</th> 
      <th width=\"200px\">End Date</th>
      <th width=\"200px\">No Of Days</th>
      <th width=\"200px\">Date Applied</th>
      <th width=\"200px\">Status</th>
      </tr>   
    ";
    while(($result = mysqli_fetch_assoc($data)))
    {
      echo " 
    <tr>
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
    echo "<br><h1>&nbsp&nbsp&nbsp NO RECORDS FOUND </h1>";
  }
 
?>
 </table>

  </body>
  </html>
  </article>
</section>






<footer>
  <p></p>
</footer>

</body>
</html>