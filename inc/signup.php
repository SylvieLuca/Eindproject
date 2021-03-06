<?php
  include_once 'header.php';
?>

<section class="block block--dark block--skewed-left">
      <div class="grid">
        <header class="block__header ">
          <h1 class="block__h1"><span>Quetie</span> and <span>Smoetie's</span> <span>Quality</span> <span>Scratching</span></h1>
          <?php
            if (!isset($_SESSION["userid"])) { ?>
              <p>Please register or log in to visit our webshop</p>
              <div>
                <a href="login.php" class="btn btn--stretched">Log In</a>
              </div>  
          </header>
      </div>
          <?php }
          ?>
    </section>

<section class="sign-up">
  <div class="main-box">
    <h1>SIGN UP</h1>
    
    <?php
      if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
          echo "<p class='dbMessage'>Fill in all fields</p>";
        }
        else if ($_GET["error"] == "invaliduid") {
          echo "<p class='dbMessage'>Choose a proper username</p>";
        }
        else if ($_GET["error"] == "invalidemail") {
          echo "<p class='dbMessage'>Choose a proper email</p>";
        }
        else if ($_GET["error"] == "passwordsdontmatch") {
          echo "<p class='dbMessage'>Passwords don't match</p>";
        }
        else if ($_GET["error"] == "stmtfailed") {
          echo "<p class='dbMessage'>Something went wrong, try again</p>";
        }
        else if ($_GET["error"] == "usernametaken") {
          echo "<p class='dbMessage'>Username already taken!</p>";
        }
        else if ($_GET["error"] == "none") {
          echo "<p class='dbMessage'>You have signed up!</p>";
        }
      }
    ?>  

    <form action="includes/signup.inc.php" method="post">
    
    <input
      class="box"
      type="text"
      name="firstName"
      placeholder="First name"
    />

    <input class="box" type="text" name="lastName" placeholder="Last name" />
    <input class="box" type="email" name="email" placeholder="Email" />
    <input class="box" type="text" name="uid" placeholder="Username" />
  
    <div class="pwd-box">
      <input
        class="box form__input"
        type="password"
        name="pwd"
        placeholder="Your password - 6 characters to make him happy ----> "
        pattern=".{6,}"
        required
      />
      <span id="icon"></span>
    </div>

      <input
        class="box"
        type="password"
        name="pwdrepeat"
        placeholder="Repeat password"
      />
      <button class="btn form--button" type="submit" name="submit">Sign Up</button>
      </form>

      </div>

      </section>
  


<?php 
  include_once 'footer.php';
  ?>