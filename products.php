<!DOCTYPE html>
<html lang="en">
<head>
<title>Product</title>
<meta charset="utf-8">
<meta name = "format-detection" content = "telephone=no" />
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet" href="css/stuck.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/touchTouch.css">
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/script.js"></script> 
<script src="js/superfish.js"></script>
<script src="js/jquery.equalheights.js"></script>
<script src="js/jquery.mobilemenu.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/tmStickUp.js"></script>
<script src="js/jquery.ui.totop.js"></script>
<script src="js/touchTouch.jquery.js"></script>

<script>
 $(document).ready(function(){

  $().UItoTop({ easingType: 'easeOutQuart' });
  $('#stuck_container').tmStickUp({});
  $('.gallery .gall_item').touchTouch();

  }); 
</script>

</head>

<body>
<!--==============================
              header
=================================-->
<header>
<!--==============================
            Stuck menu
=================================-->
  <section id="stuck_container">
    <div class="container">
      <div class="row">
        <div class="grid_12">
        <h1>
          <a href="index.html">
            <img src="images/logo.png" alt="Logo alt">
          </a>
        </h1>  
          <div class="navigation ">
            <nav>
              <ul class="sf-menu">
               <li><a href="index.html">HOME</a></li>
               <li class="current"><a href="products.html">CATEGORIES</a></li>
               <li><a href="about.html">ABOUT</a></li>
               <li><a href="login.html">LOG IN</a></li>
               <li><a href="cart.html">CART</a></li>
              </ul>
            </nav>        
            <div class="clear"></div>
          </div>
        </div>
      </div>
    </div>
  </section> 
</header>        
<section class="content gallery pad1"><div class="ic">More Website Templates @ TemplateMonster.com - July 30, 2014!</div>
  <div class="container">
    <div class="row">
<?php  
  $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
  /* AUTO-LOAD */
  function __autoload($class_name){
    require_once "./models/{$class_name}.php";
  }
  $db = new DataBase();
  
  $products = $db->get_products_by_category($category);
  //var_dump($products);
  
  $product_head = '<div class="grid_4"><div class="gall_block"><div class="maxheight"><span style="display: none;">';
  //__ID__
  $product_body_1 = '</span><img src="';
  //__URL__
  $product_body_2 = '"><div class="gall_bot"><div class="text1"><a href="#">';
  //__NAME__
  $product_body_3 = '</a></div>';
  //__DESCRIPTION__
  $product_body_4 = '<br><br>$';
  //__PRICE__
  $product_body_5 = '<br><a href="#" class="btn">Buy</a></div></div></div></div>';
  $delimeter = '<div class="clear sep__1"></div>'; // EVERY THREE PRODUCTS
  $count = 1;
  
  foreach($products as $key => $value){
    $product_str = $product_head . $value['product_id'] . $product_body_1;
    $product_str .= $value['url'] . $product_body_2 . $value['product_name'];
    $product_str .= $product_body_3 . $value['description'] . $product_body_4;
    $product_str .= $value['price'] . $product_body_5;
    if($count % 3 == 0){
      $product_str .= $delimeter;
    }
    $count++;
    
    echo $product_str;
  } // END FOREACH LOOP
?>
    </div>
  </div>
</section>
<!--==============================
              footer
=================================-->
<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="grid_12">  
        <div class="socials">
          <a href="#" class="fa fa-twitter"></a>
          <a href="#" class="fa fa-facebook"></a>
          <a href="#" class="fa fa-google-plus"></a>
          <a href="#" class="fa fa-pinterest"></a>
        </div>
        <div class="copyright"><span class="brand">Baymax </span> &copy; <span id="copyright-year"></span>  </br> San Jose State University | CS 174
        </div>
      </div>
    </div>
  </div> 
</footer> 
</body>
</html>