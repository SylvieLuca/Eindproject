<?php
    include_once 'header.php';
?>
<?php

if (isset($_SESSION['cart'])) {
    $cart=$_SESSION['cart'];

}
    echo "<div id='cart'>";
    echo "<table class='myTable'>";
    echo "<tbody class='shopping-cart-table'>";
    if (isset($cart)) {

        echo "<tr id='firstrow'><th>Name</th><th>Description</th><th>Price</th>";
		foreach($cart as $item){
				
		echo "<tr id='cart' class='shopping-cart-product product-item' style='width: auto'>
            <td id='cart' class='product-name'>".$item['name']."</td'>
            <td><img id='cart' class='product-image' src='".$item['image']."' height='150' width='auto' alt='Image'></img></td>
            <td id='cart' class='product-description'>".$item['description']."</td>
            <td id='cart' class='product-price'>".$item['price']."</td>
            </tr><br>";
        }
  echo "</table>";
  echo "</div>";
    } else {
        echo "Your cart is empty";
    }
?>
