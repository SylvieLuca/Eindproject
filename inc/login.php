<?php
  include_once 'header.php';
?>

<section class="block block--dark block--skewed-left">
  <div class="grid">
        <header class="block__header ">
          <h1 class="block__h1"><span>Quetie</span> and <span>Smoetie's</span> <span>Quality</span> <span>Scratching</span></h1>
          <div>
          <a href="signup.php" class="btn btn--accent btn--stretched">Register</a>
        </div>  
        </header>
      </div>
    </section>

<section class="sign-up">
  <div class="main-box">
    <h2>LOG IN</h2>

    <form action="includes/login.inc.php" method="post">
        
    <input 
      class="box" 
      type="text" 
      name="uid" 
      placeholder="Username/Email" 
    />

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
    
      <button class="mybutton" type="submit" name="submit">Log In</button>
      </form>

      </div>


  
  <?php
if (isset($_GET["error"])) {
  if ($_GET["error"] == "emptyinput") {
    echo "<p>Fill in all fields</p>";
  }
  else if ($_GET["error"] == "wronglogin") {
    echo "<p>Incorrect login information</p>";
  }
}
?>
</section>

<?php
  include_once 'footer.php';
?>