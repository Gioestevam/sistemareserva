<?php
	require "../../config.php";
	
	logout();

	session_start();

	if(isset($_SESSION["email_user"])){
		echo "Login Success, Bem Vindo ". $_SESSION["name_user"];
		echo "<form method='POST'><input type='submit' name='logout' value='Logout'></input></form>";
	} else {
		header("location:../index.php");
	}
?>
<div>
	<div>
		MENU TOOL-BAR
	</div>
</div>