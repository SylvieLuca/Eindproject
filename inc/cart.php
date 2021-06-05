<?php
    include_once 'header.php';
?>
<?php

if (isset($_SESSION['cart'])) {
    $cart=$_SESSION['cart'];

}
    echo "<div>";
    echo "<table class='myTable'>";
    echo "<tbody class='shopping-cart-table'>";
    if (isset($cart)) {
		foreach($cart as $item){
				
		echo "<tr class='shopping-cart-product product-item' style='width: auto'>
            <td class='product-name'>".$item['name']."</td'>
            <td><img class='product-image' src='".$item['image']."' height='150' width='auto' alt='Image'></img></td>
            <td class='product-description'>".$item['description']."</td>
            <td class='product-price'>".$item['price']."</td>
            </tr><br>";
        }
  echo "</table>";
  echo "</div>";
    } else {
        echo "Your cart is empty";
    }
?>
