<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quetie and Smoetie's Quality Scratching</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  </head>
  <body>
  <header>
    <nav class="nav collapsible">
      <a class="nav__brand" href="index.html"><img class="link__logo" src="images/logoSmall.png" alt="Quetie and Smoetie's Quality Scratching Logo" /></a>
      <svg class="icon icon--white nav__toggler">
        <use xlink:href="images/sprite.svg#menu"></use>
      </svg>
      <ul class="list nav__list collapsible__content">

        <?php
        
        if (isset($_SESSION["userid"])) {
          echo "<li class='nav__item'><a href='index.html'>Home</a></li>";
          echo "<li class='nav__item'><a href='shop.html'>Shop</a></li>";
          echo "<li class='nav__item'><a href='shoppingCart.html'>Shopping Cart</a></li>";
          echo "<li class='nav__item'><a href='profile.php'>Profile Page</a></li>";
          echo "<li class='nav__item'><a href='includes/logout.inc.php'>Log Out</a></li>";
        }
        else {
          echo "<li class='nav__item'><a href='index.html'>Home</a></li>";
          echo "<li class='nav__item'><a href='signup.php'>Sign Up</a></li>";
          echo "<li class='nav__item'><a href='login.php'>Log In</a></li>";
        }
      ?>

      </ul>
    </nav>
  </header>
  </body>