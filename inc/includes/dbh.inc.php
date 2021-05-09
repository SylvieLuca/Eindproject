<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "krabpalen";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

//Foutmelding weergeven als connectie niet gelukt is
if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}
