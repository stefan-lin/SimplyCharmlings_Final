<?php  
  include 'views/header.php';
  /* SESSION START*/
  session_unset();
  session_start();
  
  /* AUTO-LOAD */
  function __autoload($class_name){
    require_once "./models/{$class_name}.php";
  }
  $ah = new AccountHelper();
  
  $usr_email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $usr_fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
  $usr_lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
  $usr_passw = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
  $usr_addrs = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
  $usr_phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
  
  if($ah->is_email_existing($usr_email)){
    /* EMAIL ALREADY EXISTS */
    session_unset();
    echo "<script>alert('Invalid email.');window.location.href='login.html'; </script>";
  }
  else{
    $packed_usr_info = array(
      'fname'    => $usr_fname,
      'lname'    => $usr_lname,
      'email'    => $usr_email,
      'password' => $usr_passw,
      'address'  => $usr_addrs,
      'phone'    => $usr_phone
    );
    if($ah->add_new_user($packed_usr_info)){
      $_SESSION['loged_in'] = true;
      $_SESSION['username'] = $usr_email;
      $_SESSION['timeout'] = time();
      echo "<script>alert('Thank you for registering SimplyCharmlings!');window.location.href='index.html'; </script>";
    }
    else{
      session_unset();
      echo "<script>alert('Unexpected error while registering account. Please try again.');window.location.href='login.html'; </script>";
    }
  }
  include 'views/footer.php';
?>