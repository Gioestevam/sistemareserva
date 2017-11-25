<?php
	require_once("../../crud/crud.php");
	
	if(!$_SESSION['logged'] == "logged") {
		logout();
		header("Location: /index.php");
	} else {
		header("Location: /index.php");
	}
?>