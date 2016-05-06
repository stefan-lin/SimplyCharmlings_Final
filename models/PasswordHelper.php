<?php
  @include_once('Constant.php');
  class PasswordHelper{
    function __construct(){

    } // END CONSTRUCTOR

    /**
     * FUNCTION : get_hash
     *
     * GENERATE HASH KEY FOR PASSWORD
     *
     * @param $string_input : USER PASSWORD INPUT
     * @return AN ARRAY CONTAINS (HASHED KEY, SALT STRING)
     */
    function get_hash($string_input){
      $salt = $this->_get_salt();
      $mod_input = $string_input . $salt;
      return array(hash(HASH_ALGO, $mod_input), $salt);
      //return hash(self::HASH_ALGO, $mod_input);
    } // END get_hash FUNCTION

    /**
     * FUNCTION : _get_salt
     *
     * GENERATE SALT STRING WITH openssl_random_pseudo_bytes
     *
     * @return A HEX STRING
     */
    private function _get_salt(){
      return bin2hex(openssl_random_pseudo_bytes(32));
    } // END _get_salt FUNCTION
  } // END CLASS PasswordHelper
?>
