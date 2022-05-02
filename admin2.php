<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin</title>
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

<?php
  if ($_SESSION['user_type'] != 'admin')
  header('location: login.php?reason=user_type');
?>

</head>
<body>

<h2>Welcome To LMS</h2>
<!-- <p>In this example, we have created a header, two columns/boxes and a footer. On smaller screens, the columns will stack on top of each other.</p>
<p>Resize the browser window to see the responsive effect.</p>
<p><strong>Note:</strong> Flexbox is not supported in Internet Explorer 10 and earlier versions.</p> -->

<header>
  <h2>Leave Management System </h2>
  <h3 style="color: white">[ ADMIN ]</h3>
  <a class="home" href="index.html">Home</a>&nbsp;&nbsp; | &nbsp;&nbsp;<a class="logout" href="login.php">Logout</a> 
</header>

<section>
  <nav>
    <ul>
      <li><a href="admin1.php">View Requests</a></li><br>
      <li><a href="admin2.php">Update Staff</a></li><br>
      <li><a href="delete_staff.php">Delete Staff</a></li><br>
      <li><a href="admin3.php">Program Coodinator</a></li><br>
     
    </ul>
  </nav>


<article>
    <h1>Search Staff</h1><br>
    <html>
    <body>
    <form name="MY Form" action="edit.php">
    
  <div class="container">
    <label for="search_by"><b>Staff Name : &nbsp</b></label>
    <input type="text" placeholder="Name" name="search_by" required>
    <br>
    <label for="staff_id"><b>Staff ID :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b></label>
    <input type="text" placeholder="Staff ID" name="staff_id" required>
    <br><br><br>
   <!--  <label for="password"><b>Create Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    <br> -->
     <button type="submit">Search</button><br><br>
  </div>
    </form>
    </body>
  </html>
  </article>
</section>








<footer>
  <p></p>
</footer>

</body>
</html>