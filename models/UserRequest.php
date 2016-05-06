<?php
class UserRequest{
  // CLASS CONSTANTS
  const DELIMITERS = ' ';
  const SELECT_ALL_STATEMENT = 'SELECT *';
  const FROM_STATEMENT       = 'FROM ';
  const PRODUCT_TABLE           = 'Product ';
  const WHERE_STATEMENT         = 'WHERE ';
  const PRODUCT_COLOR_EQUALS_TO = 'color = ';
  const PRODUCT_NAME_EQUALS_TO  = 'product_name = ';
  const OR_STATEMENT            = 'OR ';
  const LIMIT_STATEMENT         = 'LIMIT ';

  // CLASS PRIVATE ATTRIBUTES
  private $colors = array(
    'RED'    => 1,
    'WHITE'  => 2,
    'BLACK'  => 3,
    'YELLOW' => 4,
    'PINK'   => 5,
    'GREEN'  => 6,
    'BROWN'  => 7
  );
  private $type_request  = array();
  private $color_request = array();
  private $name_request  = array();
  private $num_display   = 10;
  private $sql_query     = null;

  // GETTER FUNCTIONS
  public function get_query(){ return $this->sql_query; }
  public function get_num_color_requests(){
    return count($this->color_request);
  }
  public function get_num_name_requests(){
    return count($this->name_request);
  }
  public function get_color_requests(){ return $this->color_request; }
  public function get_name_requests(){ return $this->name_request; }

  //TO-DO: IMPLEMENT DISCOUNT FUNCTION
  /**
   * CONSTRUCTOR
   *
   * PARSE USER INPUT AND STORE QUERY INTO $this->sql_query
   */
  function __construct(
      $usr_request = '',
      $input_num_display = 10,
      $discount_flag = false){
    $this->num_display = $input_num_display;
    if(strlen($usr_request) == 0){
      $this->sql_query = self::SELECT_ALL_STATEMENT .
                         self::FROM_STATEMENT .
                         self::PRODUCT_TABLE;
      if($input_num_display != ''){ // IF WITH LIMIT REQUEST
        $this->sql_query .= self::LIMIT_STATEMENT;
        $this->sql_query .= $this->num_display . ';';
      }
      else{ // IF USER DON'T CARE HOW MANY REQUESTS RETURNED
        $this->sql_query .= ';';
      }
    } // END IF - NO REQUEST FOR COLOR/NAME SEARCHING
    else{ // ELSE - HAS REQUEST FOR SEARCHING
      $this->parse_usr_request($usr_request);
      $this->build_query();
    }
  } // END __construct FUNCTION

  /**
   * parse_usr_request FUNCTION
   *
   * SPLIT INPUT STRING AND STORE INTO COLOR REQUEST ARRAY AND NAME REQUEST
   * ARRAY
   */
  private function parse_usr_request($usr_request){
    // SPLIT THE USER INPUT STRING
    $tokens = explode(self::DELIMITERS, $usr_request);
    foreach ($tokens as $token){
      $upper_token = strtoupper($token);
      if(array_key_exists($upper_token, $this->colors)){
        array_push($this->color_request, $this->colors[$upper_token]);
      } // END IF
      else{
        array_push($this->name_request, strtolower($token));
      } // END ELSE
    } // END FOREACH
  } // END parse_usr_request FUNCTION

  /**
   * build_query FUNCTION
   *
   * ACCORDING TO color_request ARRAY AND name_request ARRAY, BUILD REQUEST
   * QUERY:
   *   SELECT * FROM Product WHERE [color = :1 [ OR color = :2 [...]]]
   *   [OR name = :3 [OR name = :4 [...]]] [LIMIT number];
   */
  private function build_query(){
    $color_cond = '';
    $name_cond  = '';
    $this->sql_query = self::SELECT_ALL_STATEMENT .
                       self::FROM_STATEMENT .
                       self::PRODUCT_TABLE .
                       self::WHERE_STATEMENT;
    $num_color_request = count($this->color_request);
    $num_name_request  = count($this->name_request);
    $index = 1;
    if($num_color_request >0){
      foreach ($this->color_request as $item){
        $color_cond .= self::PRODUCT_COLOR_EQUALS_TO;
        $color_cond .= ':' . strval($index);
        $color_cond .= ' ';
        if($index != $num_color_request){
          $color_cond .= self::OR_STATEMENT;
        }
        $index += 1;
      }
      if($num_name_request > 0){ // IF THER ARE ANY NAME REQUESTS
        $color_cond .= self::OR_STATEMENT;
      } // END IF
    } // END IF - COLOR REQUEST

    if($num_name_request >0){
      foreach($this->name_request as $itme){
        $name_cond .= self::PRODUCT_NAME_EQUALS_TO;
        $name_cond .= ':' . strval($index);
        $name_cond .= ' ';
        if($index < ($num_name_request + $num_color_request)){
          $name_cond .= self::OR_STATEMENT;
        }
        $index += 1;
      }
    }

    // ASSEMBLE THE QUERY
    $this->sql_query .= $color_cond . $name_cond;
    if($this->num_display != ''){
      $this->sql_query .= self::LIMIT_STATEMENT;
      $this->sql_query .= $this->num_display . ';';
    }
    else{
      $this->sql_query .= ';';
    }
  } // END FUNCTION build_query

} // END UserRequest CLASS
?>
