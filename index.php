<?php
	require_once("config.php");
?>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>SOLICITAÇAO DE EQUIPAMENTOS</title>
		<link rel="stylesheet" type="text/css" href="assets/css/design.css">
	</head>
	<body class="body-login">
		<div id="color_background">
			<center>
		        <div id="logo">
		            <img src="assets/img/logo.png">
		        </div>
		 	</center>
			<div>
				<?php
					if(isset($_POST['login'])) {
						$email = filter_input(INPUT_POST,"email_user", FILTER_SANITIZE_STRING);
						$password = sha1(md5(filter_input(INPUT_POST,"password_user", FILTER_SANITIZE_STRING)));
						
						if(empty($email) OR empty($password)) {
							echo "<script>alert('Preencha todos os campos!');</script>";
						} else {
							login($email, $password);
							header("Location: /logado/admin/admin.php");
						}
					}
				?>
				<form method="POST" id="form_field">					
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
