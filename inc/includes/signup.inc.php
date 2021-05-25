<?php

//Is de gebruiker op de juiste manier naar deze pagina gekomen
if (isset($_POST["submit"])) {

  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $email = $_POST["email"];
  $username = $_POST["uid"];
  $pwd = $_POST["pwd"];
  $pwdRepeat = $_POST["pwdrepeat"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emtpyInputSignup($firstName, $lastName, $email, $username, $pwd, $pwdRepeat) !== false) {
    header("location: ../signup.php?error=emtpyinput");
    exit();
  }

  if (invalidUid($uid) !== false) {
    header("location: ../signup.php?error=invaliduid");
    exit();
  }

  if (invalidEmail($email) !== false) {
    header("location: ../signup.php?error=invalidemail");
    exit();
  }

  if (pwdMatch($pwd, $pwdRepeat) !== false) {
    header("location: ../signup.php?error=passwordsdontmatch");
    exit();
  }

  if (uidExists($conn, $username) !== false) {
    header("location: ../signup.php?error=usernametaken");
    exit();
  }

  createUser($conn, $firstName, $lastName, $email, $username, $pwd);

}
else {
  header ("location: ../signup.php");
  exit();
}
