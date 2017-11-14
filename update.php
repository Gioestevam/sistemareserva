<?php
	require "config.php";
	update();
?>
<form method="POST">
	<div id="title_form">
		<center>
			<label>Atualizar seus Dados</label>                		
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
		<input type="text" name="cpf_user" placeholder="Digite o seu cpf">
	</div>
	<div>
		<div>
			<label>Senha:</label>
		</div>
		<input type="password" name="password_user" placeholder="Digite o sua senha">
	</div>
	<div>
		<input id="btn-success"  type="submit" value="Atualizar" name="done">
	</div>
</form>