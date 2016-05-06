<?php
  /**
   * GENERAL CONSTANTS
   */
  define('INDENT', '  ');
  define('NEW_LINE', '\n');

  /**
  * THIS FOLLOWING SECTION IS ABOUT DATABASE ACCESS FOR THE PROJECT
  * DATABASE : MySQL or MariaDB
  */
  /* CONSTANTS DECLARATIONS */
  define('DB_HOST', 'mysql:host=localhost;');
  define('DB_NAME', 'dbname=simplycharmlings');
  define('DB_USR',  'root');
  define('DB_PWD',  '000000');
  define('DB_OPT',  '');

  /**
   * GENERAL CONSTANTS FOR HASH
   */
  /* CONSTANTS DECLARATIONS */
  define('HASH_ALGO', 'sha256');

  /**
   * FILE RELATED CONSTANTS
   */
   define('READ', 'r');
   define('WRITE', 'w');
   define('READ_WRITE', 'r+');
   define('CLEAR_READ_WRITE', 'w+');
   define('APPEND', 'a');
   define('CREATE_WRITE', 'x');
   define('CREATE_IF_NOT_EXIST_APPEND_READ_WRITE', 'a+');
?>
