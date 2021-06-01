<?php 
  session_start();
  echo "SL Message inside header: php session started";
  $activePage = basename($_SERVER['PHP_SELF']);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quetie and Smoetie's Quality Scratching</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.png" type="image/x-icon"> 
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  </head>
  <body>
    
  <header>
    <nav class="nav collapsible">

    <ul class="list nav__list collapsible__content">
        <li class='nav__item <?= ($activePage == 'contact.html') ? 'active':''; ?>'><a href='contact.html'>Contact</a></li>;
        <li class='nav__item <?= ($activePage == 'about.html') ? 'active':''; ?>'><a href='about.html'>About</a></li>;
      </ul>

      <a class="nav__brand" href="index.html"><img class="link__logo" src="images/logoSmall.png" /></a>
      <svg class="icon icon--white nav__toggler">
        <use xlink:href="images/sprite.svg#menu"></use>
      </svg>

      <ul class="list nav__list collapsible__content">
        <?php
        if (isset($_SESSION["userid"])) { ?>
          <li class='nav__item <?= ($activePage == 'index.html') ? 'active':''; ?>'><a href='index.html'>Home</a></li>;
          <li class='nav__item <?= ($activePage == 'shop.php') ? 'active':''; ?>'><a href='shop.php'>Shop</a></li>;
          <li class='nav__item <?= ($activePage == 'shoppingCart.html') ? 'active':''; ?>'><a href='shoppingCart.html'>Shopping Cart</a></li>;
          <li class='nav__item <?= ($activePage == 'logout.php') ? 'active':''; ?>'><a href='includes/logout.inc.php'>Log Out</a></li>;
        <?php }
        else { ?>
          <li class='nav__item <?= ($activePage == 'index.html') ? 'active':''; ?>'><a href='index.html'>Home</a></li>;
          <li class='nav__item <?= ($activePage == 'signup.php') ? 'active':''; ?>'><a href='signup.php'>Sign Up</a></li>;
          <li class='nav__item <?= ($activePage == 'login.php') ? 'active':''; ?>'><a href='login.php'>Log In</a></li>;
        <?php }
      ?>
      </ul>
    
    </nav>
  </header>
  </body>