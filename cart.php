<?php session_start(); ?>
<?php include 'views/header.php'; ?>    
<section class="content gallery pad1">
	<div class="container">
		<div class="row">

<style>
table, th, td {
	border: 1px solid black;	
}

td {
	text-align: center;
}
</style>
<table>
	<tr>
		<th>Item</th>
		<th>Price</th>	
		<th>Quantity</th>
	</tr>	
<?php
	$button1 = '<button class="decrementCart" data-value="';
	$button2 = '">-</button>';
	$productNames = array();	
	$_SESSION['total'] = 0;
	foreach($_SESSION['cart'] as $product) {
		
		echo "<tr>";
		echoCell($product[0]); // product name		
		echoCell($product[1]); // price
		echoCell($product[2]); // qty in cart
		
		$button = $button1;
		$button .= $product[0] . $button2;

		echoCell($button);

		echo "</tr>";
		
		for ($i = 0; $i < $product[2]; $i++)
			$_SESSION['total'] += $product[1];		
		$productNames[] = $product[0];
	}

	echo $_SESSION['total'];
	function echoCell($info) {
		echo "<td>";
		echo $info;
		echo "</td>";
	}	
?>
</table>
<button class="emptyCart" data-value="">EMPTY CART</button>
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

function emptyCart() {
	$empty = array();
	$_SESSION['cart'] = $empty;
}

?>

<!-- Javascript -->
<script type="text/javascript">
  $(document).ready(function(){
    $('.decrementCart').click(function(){
      var item = $(this).data("value");      
      data = { sub : ['dec', item] };
      $.post('cart.php', data, function() {
      	alert("Removing one " + data.sub[1] + " from your cart...");
      	window.location.reload();
      });
    });

    $('.emptyCart').click(function(){
    	var item = $(this).data("value");
    	data = { sub : ['empty', item] };
    	$.post('cart.php', data, function() {
    		alert("Emptying cart...");
    		window.location.reload();
    	});
    });
  });
</script>