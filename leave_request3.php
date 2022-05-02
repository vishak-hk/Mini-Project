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
  width: 50%;
  padding: 6px 10px;
  margin: 3px 0;
  display: inline-block;
  border:  solid black;
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
      <a class="home" href="index.html">Home</a>&nbsp;&nbsp; | &nbsp;&nbsp;<a class="logout" href="login3.php">Logout</a>
      </ul>
    </div>
</header>

<section>
  <nav>
    <ul>
      <li><a href="apply.php">Apply Leave</a></li>
      <li><a href="leave_request1.php">View Leave History</a></li>
      <li><a href="leave_request2.php">View Leave Status</a></li>
	   <li><a href="leave_request3.php">View Profile</a></li>
    </ul>
  </nav>
  
  <article>
    <h1>Personal Information</h1>
    <html>
    <body>
    <form name="MY Form"action="Login">
    
  <div class="container">
    <label for="staff_id"><b>Staff ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b></label>
    <input type="text" placeholder="Enter Staff ID" name="staff_id" required>
    <br><br>
    <label for="name"><b>Staff Name&nbsp;&nbsp;:</b></label>
    <input type="name" placeholder="Enter Staff Name" name="staff_name" required>
    <br><br>
    </form>
    </body>
  </html>
  </article>
</section>



<section>
  <nav>
    <ul>
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>
    </ul>
  </nav>


  <article>
    <h1>Current Leave Balance</h1>
 <!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
</head>
<body>

<!-- <h2>Bordered Table</h2>
<p>Use the CSS border property to add a border to the table.</p> 

<table style="width:100%">
  <tr>
    <th>Leave Types</th>
    <th>Maximum Allowed Types</th> 
    <th>Leave Types</th>
    <th>Remaining Leaves</th>
  </tr>
  <tr>
    <td>Casual Leave</td>
    <td>45</td>
    <td>0</td>
    <td>45</td>
  </tr>
  <tr>
    <td>fest</td>
    <td>4</td>
    <td>0</td>
    <td>4</td>
  </tr>
  <tr>
    <td>Sick Leave</td>
    <td>10</td>
    <td>0</td>
    <td>10</td>
  </tr>
<tr>
    <td>Weekend Leave</td>
    <td>10</td>
    <td>0</td>
    <td>10</td>
  </tr>


</table>-->

</body>
</html>
  </article>
</section>

<footer>
  <p></p>
</footer>

</body>
</html>