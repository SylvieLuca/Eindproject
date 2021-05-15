<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Quetie and Smoetie's Quality Scratching</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <nav>
      <div>
        <ul>
          <li><a href="index.html">Home</a></li>

          <?php
            if (isset($_SESSION["userid"])) {
              echo "<li><a href='profile.php'>Profile Page</a></li>";
              echo "<li><a href='includes/logout.inc.php'>Log Out</a></li>";
            }
            else {
              echo "<li><a href='signup.php'>Sign up</a></li>";
              echo "<li><a href='login.php'>Log In</a></li>";
              echo "<li><a href='shop.html'>Shop</a></li>";
            }
          ?>
          </ul>
      </div>
    </nav>
          </body>
