<?php
session_start();

$username = "";
$email    = "";
$errors = array(); 
$_SESSION['success'] = "";

$db = mysqli_connect('localhost', 'root', '', 'login');

if (isset($_POST['reg'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $sname = mysqli_real_escape_string($db, $_POST['sname']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($username)) {
    array_push($errors, "Username is required"); 
  }
  
  if (empty($email)) { 
    array_push($errors, "Email is required"); 
  }
    
 
  if (empty($fname)) { 
    array_push($errors, "First name is required"); 
   }
        
   
  if (empty($sname)) { 
    array_push($errors, "Second name is required"); 
             
   }
           
          
  if (empty($password_1)) { 
    array_push($errors, "Password is required"); 
  }
             
          
               
  if ($password_1 != $password_2) {
    array_push($errors, "Passwords do not match");
   }
               
          
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, "Invalid email address");
  }
  
  $sql_username = "SELECT * FROM users WHERE username = '$username'";
  $sql_email = "SELECT * FROM users WHERE email = '$email'";
  $check_username = mysqli_query($db, $sql_username) or die (mysqli_error($db));
  $check_email = mysqli_query($db, $sql_email) or die (mysqili_error($db));

  if(mysqli_num_rows($check_username) > 0){
    array_push($errors, "Username already in use!");
  }
      
  else if(mysqli_num_rows($check_email) > 0){
    array_push($errors, "Email address already in use!");
  }

    
      
    if (count($errors)==0) { 
  	   $password = md5($password_1);
  	   $query = "INSERT INTO users (username, email, password, fname, sname) 
  		 VALUES('$username', '$email', '$password', '$fname', '$sname')";
       mysqli_query($db, $query);
       $_SESSION['username'] = $username;
       $_SESSION['success'];
       header("Location: index.php");
       
      }
}

if (isset($_POST['login'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required"); 
  }
  
    
  if (empty($password)) { 
    array_push($errors, "Password is required"); 
  }
     

  if (count($errors)==0) { 
     $password = md5($password);
     $sql ="SELECT * FROM users WHERE username='$username' AND password='$password'";
     $result= mysqli_query($db, $sql);
     $resultValidation = mysqli_num_rows($result);
     if(mysqli_num_rows($result) ==1){
        //user is logged in
       $_SESSION['username'] = $username;
       $_SESSION['success'];
       header("Location: index.php");
     }
     else{
       array_push($errors, "Incorrect Username/Password"); 
     }
            
    }
         
     
  }
  
  
  
  

