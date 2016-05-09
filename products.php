
<?php session_start(); ?>
<?php include 'views/header.php'; ?>    
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
  $product_body_5 = '<br><a href="#" class="btn add_to_cart" data-value="'; //get product

  $product_body_6 = '">Add to Cart</a></div></div></div></div>';

  $delimeter = '<div class="clear sep__1"></div>'; // EVERY THREE PRODUCTS
  $count = 1;  


  foreach($products as $value){
    $product_str = $product_head . $value['product_id'] . $product_body_1;
    $product_str .= $value['url'] . $product_body_2 . $value['product_name'];
    $product_str .= $product_body_3 . $value['description'] . $product_body_4;
    $product_str .= $value['price'] . $product_body_5;
    $product_str .= $value['product_name'] . "," . $value['price'] . "," . $value['product_id'] . "," . $value['url'] . $product_body_6;
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
<?php include 'views/footer.php'; ?>


<?php

if (!empty($_POST['add'])) {
  $productArray = $_POST['add'];
  addToCart($productArray);
}

function addToCart($productArray) {
  $productName = $productArray[0];
  $productPrice = $productArray[1];  
  //$productArray = {name, price, quantity in cart, product_id}

  if (array_key_exists($productName, $_SESSION['cart'])) {// if product is already in cart
    $_SESSION['cart'][$productName][2]++; // increment quantity in cart 
  } else {    
    $_SESSION['cart'][$productName] = $productArray;        
  }    
}

?>

<!-- Javascript -->
<script type="text/javascript">
  $(document).ready(function(){
    $('.add_to_cart').click(function(){
      var item = $(this).data("value");
      var itemArray = item.split(","); // {name, price, id, img}
      itemArray.push(itemArray[3]); // push img to index 4: {name, price, id, img, img}
      itemArray[3] = itemArray[2]; // push id to index 3: {name, price, id, id, img}
      itemArray[2] = 1; // intialize quantity ot index 2: { name, price, qty, id, img}
      data = { add : itemArray };

      $.post('products.php', data, function() {
        alert("Added " + data.add[0] + " to your cart!");
      });
    });
  });
</script>