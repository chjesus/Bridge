<?php session_start();
	
	if(isset($_SESSION["tamano"])){
		unset($_SESSION["nombreA"]);
		unset($_SESSION["nombreB"]);
		unset($_SESSION["tamano"]);
		unset($_SESSION["tablero"]);
		unset($_SESSION['jugar']);
	}

	header("location:index.php");
	die();
?>