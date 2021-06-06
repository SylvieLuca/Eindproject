<?php
    include_once 'header.php';
?>

<body>

<div class="shop">

<?php
  require_once 'includes/dbh.inc.php';
  global $conn;

  $sql = "CREATE DATABASE scratching_posts";

  if ($conn->query($sql) === TRUE) {
  } else {
  }
  
  $sql = "CREATE TABLE products ( productsId INT(11) UNSIGNED
  AUTO_INCREMENT PRIMARY KEY, productsName VARCHAR(200) NOT NULL, productsDescription text
  NOT NULL, productsPrice decimal(7,2), productsImage text NOT NULL )";
  
  if ($conn->query($sql) === TRUE) {
  } else {
  }
  
  $stmt = $conn->prepare("INSERT INTO products (productsName, productsDescription, productsPrice, productsImage) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $productsName, $productsDescription, $productsPrice, $productsImage);
  
  $productsName = "First scratching post";
  $productsDescription = "This is the first scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image1.png";
  $stmt->execute();
  
  $productsName = "Second scratching post";
  $productsDescription = "This is the second scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image2.png";
  $stmt->execute();
  
  $productsName = "Third scratching post";
  $productsDescription = "This is the third scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image3.png";
  $stmt->execute();
  
  $productsName = "Fourth scratching post";
  $productsDescription = "This is the fourth scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image4.png";
  $stmt->execute();
  
  $productsName = "Fifth scratching post";
  $productsDescription = "This is the fifth scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image5.png";
  $stmt->execute();
  
  $productsName = "Sixth scratching post";
  $productsDescription = "This is the sixth scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image6.png";
  $stmt->execute();
  
  $productsName = "Seventh scratching post";
  $productsDescription = "This is the seventh scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image7.png";
  $stmt->execute();
  
  $productsName = "Eighth scratching post";
  $productsDescription = "This is the eighth scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image8.png";
  $stmt->execute();
  
  $productsName = "Ninth scratching post";
  $productsDescription = "This is the ninth scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image9.png";
  $stmt->execute();
  
  $productsName = "Tenth scratching post";
  $productsDescription = "This is the tenth scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image10.png";
  $stmt->execute();
  
  $productsName = "Eleventh scratching post";
  $productsDescription = "This is the eleventh scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image11.png";
  $stmt->execute();
  
  $productsName = "Twelfth scratching post";
  $productsDescription = "This is the twelfth scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image12.png";
  $stmt->execute();
  
  $productsName = "Thirteenth scratching post";
  $productsDescription = "This is the thirteenth scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image13.png";
  $stmt->execute();
  
  $productsName = "Fourteenth scratching post";
  $productsDescription = "This is the fourteenth scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image14.png";
  $stmt->execute();
  
  $productsName = "Fifteenth scratching post";
  $productsDescription = "This is the fifteenth scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image15.png";
  $stmt->execute();
  
  $productsName = "Sixteenth scratching post";
  $productsDescription = "This is the sixteenth scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image16.png";
  $stmt->execute();
  
  $productsName = "Seventeenth scratching post";
  $productsDescription = "This is the seventeenth scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image17.png";
  $stmt->execute();
  
  $productsName = "Eighteenth scratching post";
  $productsDescription = "This is the eighteenth scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image18.png";
  $stmt->execute();
  
  $productsName = "Nineteenth scratching post";
  $productsDescription = "This is the nineteenth scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image19.png";
  $stmt->execute();
  
  $productsName = "Twentieth scratching post";
  $productsDescription = "This is the twentieth scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image10.png";
  $stmt->execute();
  
  $productsName = "Twenty-first scratching post";
  $productsDescription = "This is the twenty-first scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image21.png";
  $stmt->execute();
  
  $productsName = "Twenty-second scratching post";
  $productsDescription = "This is the twenty-second scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image22.png";
  $stmt->execute();
  
  $productsName = "Twenty-third scratching post";
  $productsDescription = "This is the twenty-third scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image23.png";
  $stmt->execute();
  
  $productsName = "Twenty-fourth scratching post";
  $productsDescription = "This is the twenty-fourth scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image24.png";
  $stmt->execute();
  
  $productsName = "Twenty-fifth scratching post";
  $productsDescription = "This is the twenty-fifth scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image25.png";
  $stmt->execute();
  
  $productsName = "Twenty-sixth scratching post";
  $productsDescription = "This is the twenty-sixth scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image26.png";
  $stmt->execute();
  
  $productsName = "Twenty-seventh scratching post";
  $productsDescription = "This is the twenty-seventh scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image27.png";
  $stmt->execute();
  
  $productsName = "Twenty-eighth scratching post";
  $productsDescription = "This is the twenty-eighth scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image28.png";
  $stmt->execute();
  
  $productsName = "Twenty-ninth scratching post";
  $productsDescription = "This is the twenty-ninth scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image19.png";
  $stmt->execute();
  
  $productsName = "Thirtieth scratching post";
  $productsDescription = "This is the thirtieth scratching post";
  $productsPrice = "15.99";
  $productsImage = "images/image30.png";
  $stmt->execute();




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