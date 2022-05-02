<!DOCTYPE html>
<html>
<head>
<title>Register Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
<style>
body {
  font-family:Macondo, Helvetica, sans-serif;
  background-color:ghostwhite;
  font-size :20px;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: cornsilk;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 40%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: normal;
  background: #eeeeee;
  
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: thin;
}

/* Overwrite default styles of hr */
hr {
  border: 2px solid #f1f1f1;
  margin-bottom: 50px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #2da118;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: 10px;
  cursor: pointer;
  width: 30%;
  opacity: 0.9; 
  font-size : 20px
}
.registerbtn:hover {
  opacity: 1;
}



/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>
   <?php
    $reason = $_GET['reason'];
   ?>

<form method="post" action="register_backend.php">
<center>
  <div class="container">
    
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <?php
      if ($reason == "successful")
        echo "<b style='color:green'>REGISTER SUCCESSFUL</b><br><br>";
      elseif ($reason == "unsuccessful")
        echo "<b style='color:red'>REGISTER UNSUCCESSFUL</b><br><br>";
    ?>

    <label for="name"> <b>Name &nbsp;&nbsp;&nbsp;&nbsp; :</b></label>&nbsp;&nbsp;&nbsp; 
    <input type="text" placeholder="Enter Name" name="name" required><br>


 <label for="user_id"> <b>User ID &nbsp;&nbsp; :</b></label>&nbsp; &nbsp;  
    <input type="text" placeholder="Ex:user@collegename.com" name="user_id" required><br>


     <label for="password"><b>Password : &nbsp;  </b></label>
    <input type="password" placeholder="Enter Password" name="password" size="400"required><br>


    <label for="gender"><b>Gender &nbsp;&nbsp; :</b></label>&nbsp; &nbsp; &nbsp;  
    <input type="radio"  name="gender" value="M" required>Male &nbsp &nbsp; 
    <input type="radio"  name="gender" value="F" required>Female<br><br>

 <label for="phone"><b>Phone &nbsp;&nbsp; :</b></label>&nbsp; &nbsp; &nbsp;  
    <input type="text" placeholder="Enter Phone No" name="phone" required><br>


<label for="branch"> <b>Branch &nbsp;   :</b></label>&nbsp; &nbsp; &nbsp;  
    <input type="text" placeholder="Enter Branch" name="branch" required><br>

<label for="college"><b>College &nbsp;&nbsp;&nbsp;:</b></label>&nbsp; &nbsp; 
    <input  type="text" placeholder="Enter College" name="college" required><br>
	 <label for="user_type"><b>User Type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></label>&nbsp;  
   <select name="user_type" style="width:700px;height:40px">
   <option value=null><b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; ------ Select User Type ------ </b></option>
	<option value="non-teaching">Non-Teaching Staff</option>
	<option value="teaching">Teaching Staff</option>
	</select>
	<br>
	<br>
    <!-- <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p> -->
	
    <button type="submit" class="registerbtn" name="reg_user">Register</button></br><br>
    &nbsp&nbsp<a href="login.php">Login</a>&nbsp&nbsp | &nbsp&nbsp<a href="index.html">Home</a> 
	
</center>
  </div>
  
 <!--  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div> -->
</form>

</body>
</html>
