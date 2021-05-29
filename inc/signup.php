<?php
  include_once 'header.php';
?>

<section class="block block--dark block--skewed-left">
      <div class="grid">
        <header class="block__header ">
          <h1 class="block__h1"><span>Quetie</span> and <span>Smoetie's</span> <span>Quality</span> <span>Scratching</span></h1>
          <div>
          <a href="login.php" class="btn btn--accent btn--stretched">Log In</a>
        </div>  
        </header>
      </div>
    </section>

<section class="sign-up">
  <div class="main-box">
    <h2>SIGN UP</h2>
    
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
        placeholder="Your password"
        pattern=".{6,}"
        required
      />
      <span class="icon"></span>
    </div>

      <input
        class="box"
        type="password"
        name="pwdrepeat"
        placeholder="Repeat password"
      />
      <button class="btn btn--accent" type="submit" name="submit">Sign Up</button>
      </form>
      </div>


  <?php
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
      echo "<p>Fill in all fields</p>";
    }
    else if ($_GET["error"] == "invaliduid") {
      echo "<p>Choose a proper username</p>";
    }
    else if ($_GET["error"] == "invalidemail") {
      echo "<p>Choose a proper email</p>";
    }
    else if ($_GET["error"] == "passwordsdontmatch") {
      echo "<p>Passwords don't match</p>";
    }
    else if ($_GET["error"] == "stmtfailed") {
      echo "<p>Something went wrong, try again</p>";
    }
    else if ($_GET["error"] == "usernametaken") {
      echo "<p>Username already taken!</p>";
    }
    else if ($_GET["error"] == "none") {
      echo "<p>You have signed up!</p>";
    }
  }
?>
</section>

<?php 
  include_once 'footer.php';
  ?>