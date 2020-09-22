<?php 

	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}

	if(!isset($_SESSION["acc_type"])) 
	{
		header("location:../pages/login_user.php");
	}

 ?> 