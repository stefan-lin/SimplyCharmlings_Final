<?php 
  @include_once('Constant.php');
  require_once('Database.php');
  require_once('PasswordHelper.php');
  
  class AccountHelper{
    private $db;
    private $ph;
    
    function __construct(){
      $this->db = new Database();
      $this->ph = new PasswordHelper();
    }
    
    function is_email_existing($email){
      return $this->db->is_email_existing($email);
    } // END is_email_existing FUNCTION
    
    function is_password_match($email, $password){
      $password_salt = null;
      if($this->db->is_email_existing($email)){
        $password_salt = $this->db->get_password_salt($email);
        if($password_salt != null){
          $s = $password_salt['salt'];
          $pd = $password_salt['password'];
          echo "<p><h3>salt from db: $s</h3></p>";
          echo "<p><h3>password from db: $pd</h3></p>";
          $hashed_pass = $this->ph->get_password_hashed(
                            $password, $password_salt['salt']
                          );
          echo "<p><h3>password by usr: $hashed_pass</h3></p>";                
          return ($hashed_pass == $password_salt['password'])? true: false;
        }
      } // END IF
      return false;
    } // END is_password_match FUNCTION
    
    function add_new_user($user_info_arr){
      if($this->is_email_existing($user_info_arr['email'])){
        return false;
      }
      $password_salt = $this->ph->get_hash($user_info_arr['password']);
      $this->db->insert_new_user(
        $user_info_arr['email'],
        $user_info_arr['fname'],
        $user_info_arr['lname'],
        $password_salt[0],  // HASHED PASSWORD
        $password_salt[1],  // SALT
        $user_info_arr['address'],
        $user_info_arr['phone']
      );
      return true;
    } // END add_newUser FUNCTION
  }
?>