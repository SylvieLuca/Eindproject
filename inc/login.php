<?php
  include_once 'header.php';
?>

<body>
  <section class="block block--dark block--skewed-left">
    <div class="grid">
      <header class="block__header ">
        <h1 class="block__h1"><span>Quetie</span> and <span>Smoetie's</span> <span>Quality</span> <span>Scratching</span></h1>
        <?php
            if (!isset($_SESSION["userid"])) { ?>
              <p>Please register or log in to visit our webshop</p>
              <div>
                <a href="signup.php" class="btn btn--stretched">Register</a>
              </div>  
          </header>
      </div>
          <?php }
          ?>
  </section>
  
  <section class="sign-up">
    <div class="main-box">
      <h1>LOG IN</h1>
      
      <form action="includes/login.inc.php" method="post">
      
      <input 
      class="box" 
      type="text" 
      name="uid" 
      placeholder="Username/Email"
      />
      
      <div class="pwd-box">
        <input id="myInput"
              class="box form__input"
              type="password"
              name="pwd"
              placeholder="Your password"
              pattern=".{6,}"
              required
        />
        <span class="passwordIcon"></span>
      </div>
      
      <div class="pwd-show">
        <input class="check" type="checkbox" onclick="showPassword()">
        <span class="pwd-show-text">Show Password</span>
      </div>

      <button class="btn form--button" type="submit" name="submit">Log In</button>
        <?php
          if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
              echo "<p class='dbMessage'>Fill in all fields</p>";
            }
            else if ($_GET["error"] == "wrongpassword") {
              echo "<p class='dbMessage'>Incorrect login information</p>";
            }
            else if ($_GET["error"] == "wronglogin") {
              echo "<p class='dbMessage'>Incorrect login information</p>";
            }
          }
        ?>    
    </section>

    <script src="js/main.js"></script>
  
  </body>



<?php
  include_once 'footer.php';
?>