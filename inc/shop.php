<?php
    include_once 'header.php';
?>

<body>

<?php
  if (isset($_SESSION["userid"])) { ?>

<section class="block block--dark block--skewed-left">
      <div class="grid">
        <header class="block__header ">
          <h1 class="block__h1"><span>Quetie</span> and <span>Smoetie's</span> <span>Quality</span> <span>Scratching</span></h1>
          </div>
          </section>

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
  </div>

  <?php

} else { ?>
    <section class="block block--dark block--skewed-left">
      <div class="grid">
        <header class="block__header ">
          <h1 class="block__h1"><span>Quetie</span> and <span>Smoetie's</span> <span>Quality</span> <span>Scratching</span></h1>

          <?php
            if (!isset($_SESSION["userid"])) { ?>
              <p>Please register or log in to visit our webshop</p>
              <div>
                <a href="signup.php" class="btn btn--stretched">Register</a>
                <a href="login.php" class="btn btn--stretched">Log In</a>
              </div>  
          </header>
      </div>
          <?php }
          ?>
    </section><?php } ?>
  
<?php
  include_once 'footer.php';
?>

<script src="js/main.js"></script>

</body>
</html>