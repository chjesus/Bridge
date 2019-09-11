<?php session_start();
	
	if(isset($_SESSION["tablero"])){
		unset($_SESSION["nombreA"]);
		unset($_SESSION["nombreB"]);
		unset($_SESSION["tablero"]);
	}

	header("location:view.php");
	die();
?>