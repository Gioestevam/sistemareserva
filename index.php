<?php
	require "config.php";
	logar();
?>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>SOLICITAÇAO DE EQUIPAMENTOS</title>
		<link rel="stylesheet" type="text/css" href="assets/css/design.css">
	</head>
	<body>
		<div id="color_background">
			<center>
		        <div id="logo">
		            <img src="assets/img/logo.png">
		        </div>
		 	</center>
			<div>
				<form method="post" id="form_field">					
					<div>
						<label for="userLogin">Email:</label>
						<input name="email_user" type="text" aria-label="Usuário" placeholder="Usuário">
					</div>
	 
					<div>
						<label for="userPassword">Senha:</label>
						<input type="password" name="password_user" aria-label="Senha" placeholder="Senha">
					</div>
	 
					<div id="forgot_password">
						<center><a href="#">Esqueceu sua senha?</a></center>
					</div>
					<input type="submit" id="login" name="login" value="Entrar">
					<p>Não possui cadastro?
						<a href="cadastro.php">Cadastre-se agora</a>
					</p>
				</form>
			</div>
		</div>
	</body>
</html>
