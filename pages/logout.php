<?php
// Initialize the session
 session_start(); 
if(isset($_SESSION["userlogin"]) && $_SESSION["userlogin"] === true){ 

// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to home page
   header("location:log-in.php");
   exit;
}
else {
   
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
//Redirect to home page
  header("location:log-in.php");
   exit;
}
?>