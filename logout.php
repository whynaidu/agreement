<?php
 session_start();

  echo  "<script>alert('Logout Sucessful');
  </script>";
  session_destroy();   // function that Destroys Session 
  header("Location:login.php");
?>