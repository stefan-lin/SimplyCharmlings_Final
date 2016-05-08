<?php
@include_once('Constant.php');
/**
 * CLASS Database
 */
 class Database{
  //private $dbh;
  private $dbh;
  function __construct(){
  //global $dbh;
  try{
    $this->dbh = new PDO(DB_HOST.DB_NAME, DB_USR, DB_PWD);
    $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $ex){
    echo 'ERROR: '.$ex->getMessage();
  }
  } // END CONSTRUCTOR

  /**
   * FUNCTION : get_results
   *
   * THIS FUNCTION RECEIVED A QUERY STATEMENT FROM USER AND SEND THE
   * SQL REQUEST TO DATABASE. THEN, RETURN AN ASSOCIATED ARRAY
   *
   * @param : $query_statement (STRING) - THE QUERY STATEMENT BASED ON USER
   *                                      SEARCHING INPUTS
   * @param : $color_request (ARRAY) - SEARCHING REQUESTS(TOKENS) FROM USER
   * @param : $name_request (ARRAY) - SEARCHING REQUESTS(TOKENS) FROM USER
   *
   * @return associated array
   */
  function get_results($query_statement, $color_requests, $name_requests){
    $prepared_query   = null;
    $params           = array();
    $index            = 1;
    $request_products = null;
    try{
      $prepared_query = $this->dbh->prepare($query_statement);
      if(count($color_requests) > 0){
        foreach ($color_requests as $key => $value){
          $params[':'.strval($index)] = $value;
          $index += 1;
        } // END FOREACH LOOP
      }
      if(count($name_requests) > 0){
        foreach ($name_requests as $key => $value) {
          $params[':'.strval($index)] = $value;
          $index += 1;
        }
      }
      $prepared_query->execute($params); // EXECUTING QUERY
      $request_products = $prepared_query->fetchAll();
      return $request_products;
    }
    catch(PDOException $ex){
      echo 'ERROR: [get_results()] '.$ex->getMessage();
    }
  } // END get_results FUNCTION

  /**
   * FUNCTION : get_img_url
   *
   * GRABING IMG URLS FROM DATABASE ACCORDING TO THE PRODUCTS ARRAY
   * PROVIDED BY USER
   *
   * @param $requests (array) : A RAW RETURNED ASSOCIATED ARRAY (FROM
   *                            DATABASE)
   * @return AN ASSOCIATED ARRRAY
   */
  function get_img_url($requests){
    $product_id_arr = array();
    foreach ($requests as $product) {
      array_push($product_id_arr, $product['product_id']);
    } // END FOREACH LOOP
    /* BREAK DOWN ARRAY INTO A STRING */
    $inclause = implode(', ', $product_id_arr);

    try{
      $url_query = 'SELECT Image.url FROM Image, Product_Image WHERE '.
                   'Product_Image.product_id in ('. $inclause.
                   ') and Product_Image.image_id = Image.image_id;';
      $url_statement = $this->dbh->prepare($url_query);
      $url_statement->execute();
      $img_urls = $url_statement->fetchAll();

      return $img_urls;
    }
    catch(PDOException $ex){
      echo 'ERROR : get_img_ur() : ' . $ex->getMessage();
    }
  } // END get_img_url FUNCTION

  function get_img_url_by_id($product_ids){
    $inclause = implode(', ', $product_ids);
    try{
      $url_query = 'SELECT Image.url FROM Image, Product_Image WHERE '.
                   'Product_Image.product_id in ('. $inclause.
                   ') and Product_Image.image_id = Image.image_id;';
      $url_statement = $this->dbh->prepare($url_query);
      $url_statement->execute();
      $img_urls = $url_statement->fetchAll();

      return $img_urls;
    }
    catch(PDOException $ex){
      echo 'ERROR : get_img_ur_by_id() : ' . $ex->getMessage();
    }
  }

  //TODO: Update database User talbe to contain username, hash password, salt
  function is_username_exists($username_input){
    $query = "SELECT * FROM User WHERE username = :username_in";
    $statement = $this->dbh->prepare($query);
    $statement->execute(array(':username_in' => $username_input));
    $result = $statement->fetchAll();

    return (count($result) == 0)? false: true;
  } // END is_username_exists FUNCTION

  /**
   * FUNCTION :
   */
  function get_product_info_by_img_url($img_url){
    $query = 'SELECT product_name, price FROM Image AS i INNER JOIN ' .
             'Product_Image AS pi ON i.image_id = pi.image_id INNER JOIN ' .
             'Product AS p ON pi.product_id = p.product_id WHERE i.url = ';
    try{
    $url_query = $query . "'$img_url'". ';';
    $url_statement = $this->dbh->prepare($url_query);
    $url_statement->execute();
    $product = $url_statement->fetchAll();

    return $product;
    }
    catch(PDOException $ex){
    echo 'ERROR : get_img_ur_by_id() : ' . $ex->getMessage();
    }
  }
  
  function get_products_by_category($category){
    $query = "SELECT i.url, p.product_name, p.product_id, p.description, p.price ";
    $query .= "FROM Image AS i INNER JOIN Product_Image AS pi ON i.image_id = pi.image_id ";
    $query .= "INNER JOIN Product AS p ON pi.product_id = p.product_id ";
    $query .= "INNER JOIN Category AS c ON p.category_id = c.category_id ";
    $query .= "WHERE c.category_name = '$category';";
        
    try{
      $statement = $this->dbh->prepare($query);
      $statement->execute();
      $results = $statement->fetchAll(PDO::FETCH_ASSOC);

      
      return $results;
    }
    catch(PDOException $ex){
      echo 'ERROR : get_products_by_category() : ' . $ex->getMessage();
    }
  }
  
  function is_email_existing($email){
    $query = "SELECT * FROM User WHERE email=:input;";
    $stmt = $this->dbh->prepare($query);
    $stmt->bindParam(':input', $email);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return ($stmt->rowCount() == 1)? true: false;
  } // END is_email_existing
  
  function get_password_salt($email){
    $query = 'SELECT password, salt FROM User WHERE email=:input;';
    $stmt = $this->dbh->prepare($query);
    $stmt->bindParam(':input', $email);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // ['password'=>password, 'salt'=>salt]
    return (count($result) == 1)? $result[0]: null;
  }
  
  function insert_new_user($email, $fname, $lname, $pswd, $salt, $addr, $phone){
    // USER TABLE
    $user_query = 'INSERT INTO User (usr_id, email, first_name, last_name, ';
    $user_query .= 'salt, password) VALUES (null, :e, :f, :l, :s, :p);';
    $stmt = $this->dbh->prepare($user_query);
    $stmt->execute(array(
      ':e' => $email,
      ':f' => $fname,
      ':l' => $lname,
      ':s' => $salt,
      ':p' => $pswd
    ));
    
    // PHONE TABLE
    $phone_query = 'INSERT INTO Phone (phone_id, phone_str) VALUES (null, :phone);';
    $stmt = $this->dbh->prepare($phone_query);
    $stmt->bindParam(':phone', $phone);
    $stmt->execute();
    
    // ADDRESS TABLE
    $address_query = 'INSERT INTO Address (address_id, addr_str) VALUES (null, :addr);';
    $stmt = $this->dbh->prepare($address_query);
    $stmt->bindParam(':addr', $addr);
    $stmt->execute();
    
    $user_id = $this->get_user_id($email);
    $phone_id = $this->get_phone_id($phone);
    $addr_id = $this->get_address_id($addr);
    
    $query_ua = "INSERT INTO User_Address (usr_id, addr_id) VALUES ($user_id, $addr_id);";
    $query_up = "INSERT INTO User_Phone (usr_id, phone_id) VALUES ($user_id, $phone_id);";
    $stmt = $this->dbh->prepare($query_ua);
    $stmt->execute();
    $stmt = $this->dbh->prepare($query_up);
    $stmt->execute();
  } // END insert_new_user FUNCTION
  
  private function get_user_id($email){
    $query = 'SELECT usr_id FROM User WHERE email=:e;';
    $stmt = $this->dbh->prepare($query);
    $stmt->bindParam(':e', $email);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return count($result)? $result[0]['usr_id']: null;
  }
  
  private function get_phone_id($phone){
    $query = 'SELECT phone_id FROM Phone WHERE phone_str=:p;';
    $stmt = $this->dbh->prepare($query);
    $stmt->bindParam(':p', $phone);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return count($result)? $result[0]['phone_id']: null;
  }
  
  private function get_address_id($addr){
    //SELECT address_id From Address WHERE addr_str = 'San Jose';
    $query = 'SELECT address_id FROM Address WHERE addr_str=:a;';
    $stmt = $this->dbh->prepare($query);
    $stmt->bindParam(':a', $addr);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return count($result)? $result[0]['address_id']: null;
  }
} // END CLASS Database

?>
