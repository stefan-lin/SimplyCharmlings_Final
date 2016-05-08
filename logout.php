<?php  
  session_start();
  session_unset();      
  echo "<script>alert('Log Out Successfully!');window.location.href='index.html'; </script>";
  header('Location: index.html');
?>