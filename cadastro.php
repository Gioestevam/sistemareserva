<?php 
	require "config.php"; 
	create();
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="assets/css/design.css">
		<script type="text/javascript" src="assets/js/validatecpf.js"></script>
	</head>
	<body>
		<div id="color_background">
        	<center>
	        <div id="logo">
	            <img src="assets/img/logo.png">
	        </div>
	 		</center>
			<div id="form_cadastro">
			<form method="POST" id="form_cadastro">
                <div id="title_form">
                	<center>
                		<label>Tela de Cadastro</label>                		
                	</center>
                </div>
				<div>
					<div>
						<label>Nome Completo</label>
					</div>
					<input type="text" name="full_name_user" placeholder="Digite o seu Nome Completo">
				</div>
				<div>
					<div>
						<label>Nome do Usuário:</label>
					</div>
					<input type="text" name="name_user" placeholder="Digite o seu nome de usuário">
				</div>
				<div>
					<div>
						<label>Email:</label>
					</div>
					<input type="text" name="email_user" placeholder="Digite o seu email">
				</div>
				<div>
					<div>
						<label>Cpf:</label>
					</div>
					<input type="text" name="cpf_user" maxlength = "14" placeholder="Digite o seu cpf">
				</div>
				<div>
					<div>
						<label>Senha:</label>
					</div>
					<input type="password" name="password_user" placeholder="Digite a sua senha">
				</div>
				<div>
					<div>
						<label>Repita a sua Senha:</label>
					</div>
					<input type="password" name="repeat_password_user" placeholder="Digite a sua senha novamente">
				</div>
				<div>
					<button id="btn-success" name="cadastrar" type="submit" onclick="return validacaocpf()">	Cadastrar
					</button>
				</div>
			</form>
			</div>
		</div>
	</body>
</html>