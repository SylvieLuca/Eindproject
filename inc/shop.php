<?php
    include_once 'header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
</head>

<body>

<!-- <input type = "button" onclick = "javascriptTest()" value = "JAVASCRIPT TEST"> -->

<?php
// $_SESSION['productsName']=$_SESSION['productsImage']=$_SESSION['productsDescription']=$_SESSION['productsPrice']="";

// echo "<pre>";
// echo "hier doen we de echo<br>";
// print_r($_SESSION);
// echo "</pre>";
// ?>

<!-- <div>
    <ul id="show-cart">
    </ul>
    <div>You have <span id="count-cart">X</span> items in your cart</div>
    <div>Total Cart: $<span id="total-cart"></span></div>
  </div> -->

<?php

require_once 'includes/dbh.inc.php';
global $conn;

$sql = "SELECT productsId, productsName, productsDescription, productsPrice, productsImage FROM products ORDER BY productsId";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0) {
    echo "<div>";
    echo "<table class='myTable'>";

  while ($row = mysqli_fetch_array($result)) {
    
    $imgpath = $row['productsImage'];

    echo "<tr class='product-item' style='width: auto'>
            <td class='product-name'>".$row['productsName']."</td'>
            <td><img class='product-image' src='$imgpath' height='150' width='auto' alt='Image'></img></td>
            <td class='product-description'>".$row['productsDescription']."</td>
            <td class='product-price'>\xE2\x82\xAc ".$row['productsPrice']."</td>
            <td><input class='btn buy-button' type='submit' value='BUY'></td></tr>";

  }

  echo "</table>";
  echo "</div>";

}  

?>

<?php
    include_once 'footer.php';
    ?>

<script src="js/main.js"></script>

</body>
</html>