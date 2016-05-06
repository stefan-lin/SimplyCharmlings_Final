<?php
  class HistoryGen{
    const BEGIN = '<div id="slider"><a href="#" class="control_next">></a><a href="#" class="control_prev"><</a><ul style="width:2000px; marginLeft: -500px;">';
    //const BEGIN = '<div id="slider"><ul style="width:2000px; marginLeft: -500px;">';
    const END   = '</ul></div>';
    const IMG_BEGIN = '<li class="slider-img"><div class="icon"><img src="./';
    const IMG_END   = '" /></div></li>';
    // $img_urls[$index][0]
    function __construct(){}

    function get_history_images($product_ids){
      $counter = 0;
      $db = new Database();
      $img_urls = $db->get_img_url_by_id($product_ids);
      $ret_str = self::BEGIN;
      foreach($img_urls as $key => $value){
        $ret_str .= self::IMG_BEGIN . $value[0] . self::IMG_END;
        $counter += 1;
        if($counter == 5){
          break;
        }
      } // END FOREACH

      return $ret_str . self::END;
    } // END get_history_images FUNCTION

  } // END CLASS HistoryGen
?>
