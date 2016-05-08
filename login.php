<?php  
  // SET SESSION
  session_start();
  //if(isset($_SESSION['loged_in'])){
  //  /* IF ALREADY LOG IN, CLEAR IT */
  //  session_unset();
  //  //unset($_POST['login']);
  //  session_start();
  //}
  /* AUTO-LOAD */
  function __autoload($class_name){
    require_once "./models/{$class_name}.php";
  }
  $ah = new AccountHelper();
  
  if(empty($_SESSION['loged_in'])){
    echo "<p><h3>SESSION['logged_in'] HAD NOT SET.</h3></p>";
    // IF USER IS NOT LOGGED IN AND NO USERNAME
    // GET USER INFO
    $usr_email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $usr_passw = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    echo "<p><h3>email: $usr_email</h3></p>";
    echo "<p><h3>password: $usr_passw</h3></p>";
    /* VALIDATE PASSWORD AND EMAIL */
    if(!$ah->is_password_match($usr_email, $usr_passw)){
      /* NOT VALID PASSWORD OR EMAIL */
      /* RE-DERICT TO ANOTHER PAGE */
      echo "<script>alert('Username or password is incorrect. Please try again.');window.location.href='login.html'; </script>";

      echo "<p><h3>PASSWORD OR USERNAME IS NOT VALID.</h3></p>";
    }
    else{
      echo "<p><h3>SET _SESSION FIELDS.</h3></p>";
      $_SESSION['loged_in'] = true;
      $_SESSION['username'] = $usr_email;
      $_SESSION['timeout'] = time();
      echo "<script>alert('Log In Successfully!');window.location.href='index.html'; </script>";
    } // END IF-ELSE
  } // END IF
  else{
    $current_user = $_SESSION['username'];
    echo "<script>alert('You currently logged in as $current_user. Please log out first.');window.location.href='index.html'; </script>";
  }
  
  
  
  
  
  
  
  
?>