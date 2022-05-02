<?php
    include 'config.php';
    session_start();
    if (isset($_POST['Login'])) {
        $username = mysqli_real_escape_string($db, $_POST['user_id']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
    
        if (empty($username)) {
            echo "Username is required";
        }
        if (empty($password)) {
            echo "Password is required";
        }
        $query = "SELECT * FROM user_info WHERE user_id='$username' AND password='$password'";
        
          $results = mysqli_query($db, $query);
          
          if (mysqli_num_rows($results) == 1) {
            $row = mysqli_fetch_array($results);
            $user_type = $row['user_type'];

            if (session_status() === PHP_SESSION_NONE) {
              session_start();
            }
            $_SESSION['user_id'] = $username;
            $_SESSION['login'] = "true";
            $_SESSION['user_type'] = $user_type;

            if($user_type == 'non-teaching' or $user_type == 'teaching') {
              header('location: apply.php');
            }
          }
            
          else {
              $sql = "SELECT * FROM admin WHERE user_id='$username' AND password='$password'";
              $res = mysqli_query($db, $sql);
          
          if (mysqli_num_rows($res) == 1) {
            $row1 = mysqli_fetch_array($res);
            $user_type = $row1['user_type'];
            
            if (session_status() === PHP_SESSION_NONE) {
              session_start();
            }
            $_SESSION['user_id'] = $username;
            $_SESSION['login'] = "true";
            $_SESSION['user_type'] = $user_type;
            
            if($user_type == 'admin') {
              header('location: view.php');
            }
          }
          else {
            header('location: login.php?reason=inv');
          }
        }
    }
     
           
?>