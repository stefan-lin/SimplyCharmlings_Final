<?php
@require_once('Constant.php');

class FileHandler{
  protected $file_handler;
  protected $file_mode;

  function __construct($file_name, $mode=READ){
    $this->file_mode = $mode;
  }

  function change_mode($mode=READ){
    $this->file_mode = $mode;
  }

  //TODO: IMPLEMENT get line by line
  function get_content_line_by_line(){
    return '';
  }
} // END CLASS FileHandler
?>
