<?php
session_start();
$_SESSION += $_POST;
var_dump($_SESSION);
?>