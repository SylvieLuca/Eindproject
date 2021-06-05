<?php
    include_once 'header.php';
?>

<body>

<div class="shop">

<?php
  require_once 'includes/dbh.inc.php';
  global $conn;

  $sql = "SELECT productsId, productsName, productsDescription, productsPrice, productsImage FROM products ORDER BY productsId";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  if($resultCheck > 0) {
    echo "<table class='myTable'>";
  while ($row = mysqli_fetch_array($result)) {

    $imgpath = $row['productsImage'];

    echo "<tr class='product-item'>
          <td class='product-name'>".$row['productsName']."</td'>
          <td><img class='product-image' src='$imgpath' height='150' width='auto' alt='Image'></img></td>
          <td class='product-description'>".$row['productsDescription']."</td>
          <td class='product-price'>\xE2\x82\xAc ".$row['productsPrice']."</td>
          <td><input class='btn buy-button shop-button' type='submit' value='BUY'></td></tr>";

  }
  echo "</table>";
}

?>

    <ul id="show-cart">
    </ul>
    <!-- <div>You have <span id="count-cart">X</span> items in your cart</div>
    <div>Total Cart: $<span id="total-cart"></span></div> -->
  </div>

<?php
  include_once 'footer.php';
?>

<script src="js/main.js"></script>

</body>
</html>