<?php session_start(); ?>
<?php include 'views/header.php'; ?>    
<section class="content">
	<div class="container">
		<div class="row">
			<div class="grid_12">
			<h2>Your Cart</h2>
			</div>

<?php
	//html tags for decrement button
	$button1 = '<button class="decrementCart" data-value="';
	$button2 = '">-</button>';

	//html tags for add button
	$button3 = '<button class="addOne" data-value="';
	$button4 = '">+</button>';	

	//intialize cartItems and cartTotal
	$_SESSION['cartItems'] = array();
	$_SESSION['total'] = 0;



	//assign html tags to PHP variables
	// $product = { name, price, qty, id, url }
	$htmlHead = '<div class="grid_12">
							 <div class="maxheight" style="height: 249px;">
							 <div class="box_inner">
							 <span style="display: none;">';
	// attach id
	$htmlBody1 = '</span>
								<div class="grid_3special">
								<img src="';
	// attach url
	$htmlBody2 = '"></div> 
								<div class = "grid_4special">
								<div class="text1"><h1 style="font-size: x-large;">';
	// attach name
	$htmlBody3 = '</h1></div></div>
								<div class="grid_1special big">$';
	// attach price
	$htmlBody4 = '<br><h1>';
	// attach qty
	$htmlBody5 = '</h1></div>
								<div class="grid_1add top">
								<a href="#" class="link1" data-value="';
	// attach name
	$htmlBody6 = '">+</a></div>
								<div class="grid_1add top">
								<a href="#" class="link3" data-value="';
	// attach name
	$htmlBody7 = '">-</a></div></div></div></div>';
								
	// $product = { name, price, qty, id, url }
	foreach($_SESSION['cart'] as $product) {

		$htmlString = $htmlHead . $product[3] . $htmlBody1
								. $product[4] . $htmlBody2 . $product[0]
								. $htmlBody3 . $product[1] . $htmlBody4
								. $product[2] . $htmlBody5 . $product[0]
								. $htmlBody6 . $product[0] . $htmlBody7;

		echo $htmlString;

		// separate items
		echo '<div class="grid_12"><p></div>';

		$_SESSION['cartItems'][] = $product[3];
		for ($i = 0; $i < $product[2]; $i++)
			$_SESSION['total'] += $product[1];		
	}

	// show total
	echo '<div class="grid_12">
					<h2>Total: $' . $_SESSION['total'] . 
					'</h2></div>';
?>      

<div class="grid_12special">
<a href="#" class="link4">Empty Cart</a>
</div>

<div class="grid_12">
<a href="#" class="link2">Checkout</a>
</div>

		</div>
	</div>
</section>

<?php include 'views/footer.php'; ?>

<?php 

if (!empty($_POST['sub'])) {
	switch ($_POST['sub'][0]) {
		case 'dec':
			$productName = $_POST['sub'][1];
			decrementCart($productName);
			break;
		case 'add':
			$productName = $_POST['sub'][1];
			addOne($productName);
			break;
		case 'empty':
			emptyCart();
			break;		
	}	
}

function decrementCart($productName) {
	if (array_key_exists($productName, $_SESSION['cart'])) {
		$_SESSION['cart'][$productName][2]--;
	}
	if ($_SESSION['cart'][$productName][2]==0) {		
		unset($_SESSION['cart'][$productName]);
	}
}

function addOne($productName) {
	$_SESSION['cart'][$productName][2]++;
}

function emptyCart() {
	$empty = array();
	$_SESSION['cart'] = $empty;
}

?>

<!-- Javascript -->
<script type="text/javascript">
  $(document).ready(function(){
    $('.link3').click(function(){ // decrement from cart
      var item = $(this).data("value");      
      data = { sub : ['dec', item] };
      $.post('cart.php', data, function() {
      	alert("Removing one " + data.sub[1] + " from your cart...");
      	window.location.reload();
      });
    });

    $('.link1').click(function(){ // add to cart
    	var item = $(this).data("value");
    	data = { sub : ['add', item] };
    	$.post('cart.php', data, function() {
    		alert("Adding one " + data.sub[1] + " to your cart!");
    		window.location.reload();
    	});
    });

    $('.link4').click(function(){ // empty cart
    	var item = $(this).data("value");
    	data = { sub : ['empty', item] };
    	$.post('cart.php', data, function() {
    		alert("Emptying cart...");
    		window.location.reload();
    	});
    });    
  });
</script>