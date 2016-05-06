<?php
/**
 * ProductFormator CLASS
 *
 * THIS CLASS BUILDS LIST BLOCK (html) FOR DISPLAYING SEARCHING PRODUCT(s)
 */
class ProductFormator{
  const PART_0 = '<div class="gray" style="display: block;"><div class="icon"><img src="'; // .IMAGE_PATH
  const PART_1 = '<div class="white" style="display: block;"><div class="icon"><img src="'; // .IMAGE_PATH
  const PART_2 = '"></div><h2>'; // .PRODUCT_NAME
  const PART_3 = '</h2><p class="bio">'; // .PRICE
  const PART_4 = '</p><p class="bio">'; // .DESCRIPTION
  const PART_5 = '</p>';

  function __construct(){}

  public function convert($products, $img_urls){
    $ret_str = '';
    $index = 0;
    foreach ($products as $product){
      if(($index+1)%2 == 0){
        $ret_str .= self::PART_1 . $img_urls[$index][0];
      }
      else{
        $ret_str .= self::PART_0 . $img_urls[$index][0];
      }
      $ret_str .= self::PART_2 . $product['product_name'];
      $ret_str .= self::PART_3 . $product['price'];
      $ret_str .= self::PART_4 . $product['description'];
      $ret_str .= '</p></div>';
      $index += 1;
    } // END FOREACH
    // DEBUG
    //$t_str = preg_replace("(<)", "&lt", $ret_str);
    //$t_str = preg_replace("(>)", "&gt", $t_str);
    return $ret_str;
  } // END convert FUNCTION
} // END ProductFormator CLASS
 ?>
