<?php 
	if (!isset($_SESSION)) {
		session_start();
	}
	// $con = mysqli_connect("remotemysql.com","wx2j0z2kNU","tZrl2EMoOV","wx2j0z2kNU") or die("sorry could not connect");

	$con = mysqli_connect("localhost","root","","dreamz_technology") or die("sorry could not connect");
?>