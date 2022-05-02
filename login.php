<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;
}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: solid ;
  box-sizing: border-box;
}

.nav {
  font-size: 25px;
  padding-right: 40px;
  font-family: Arial, Helvetica, sans-serif;
}
button {
  background-color: #2da118;
  color: white;
  padding: 14px 20px;
  margin: 10px 0;
  border: solid;
  cursor: pointer;
  width: 19%;
  font-size: 20px;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color:#dc143c;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 20%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 200px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
 <center>
   <?php
    $reason = $_GET['reason'];
   ?>
<h2>Login Form</h2>

<form action="login_backend.php" method="post">
  <div class="imgcontainer">
  <div class="right-side">
 <ul class="nav">
  <a href="index.html">Home</a>
  </ul>
  </div>
    <img src="images/user.png" alt="Avatar" class="avatar">
  

  <div class="container">
    <?php
      if ($reason == "user_type")
        echo "<b style='color:red'>Unauthorized access. Please try again</b><br>";
      elseif($reason == "inv")
        echo "<b style='color:red'>Wrong Username / Password</b><br>"; 
    ?>
    <label for="user_id"><b>User Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></label>
    <input type="text" placeholder="Enter Username" name="user_id" required><br><br>

    <label for="password"><b>Password&nbsp;:</b></label>
    <input type="password" placeholder="Enter Password" name="password" required><br><br>
        
   &nbsp;&nbsp;&nbsp;&nbsp; <button type="submit"name="Login">Login</button><br>
   &nbsp;&nbsp;&nbsp;&nbsp; <button style='background-color:grey' type="reset"name="reset">Reset</button>
  </div>
	
</form>
</center>
  </div>
</body>
</html>



