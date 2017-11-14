<?php
	require "../../config.php";

	logout();

	session_start();

	if(isset($_SESSION["email_user"])){
	} else {
		header("location:index.php");
	}
?>
<html>
	<head>
		<meta charset ="utf-8">
		<title>Administrador</title>
		<link rel="stylesheet" type="text/css" href="../../assets/css/design.css">
	</head>
	<body>
		<div id="color_logged">
			<div class="logofacima">
				<img class="imgfaclogo" src="http://bit.ly/2yMoENh">
			</div>
			<div class="div-menu-lateral">
				<input type="checkbox" id="bt_menu" />
				<label for="bt_menu">&#9776;</label>
				<nav class="menu">
					<ul>
						<li>
							<a href="../lib/profile.php">Perfil</a>
						</li>
						<li>
							<a href="../lib/user.php">Usuários</a>
						</li>
						<li>
							<a href="../lib/reserve.php">Reservados</a>
						</li>
						<li>
							<a href="../lib/stock.php">Estoque</a>
						</li>
						<li>
							<a href="../lib/stats.php">Estatisticas</a>
						</li>
					</ul>
				</nav>
			</div>
			<div class="absolutecabecalho">
				Reservados
				<!-- ou nome da pagina atual  -->
			</div>
			<div class="absoluteimgsair">
				<a href="link-de-saida" title="SAIR">
					<label for="bt_sair">Sair &#x27A8; </label>
				</a>
			</div>
			<div class="divprincipal">
				<table>
					<thead>               
						<tr>
							<td>Numero do pedido</td>
							<td>Data de pedido:</td>
							<td>Data da Entrada:</td>
							<td>Itens do Pedido:</td>
							<td>Local de Entrega:</td>
							<td>Solicitante:</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>fulano</td>
							<td>35/02/3015</td>
							<td>sei la</td>
						</tr>

						<tr>
							<td>eu</td>
							<td>666/666/666</td>
							<td>pc da nasa</td>
						</tr>

						<tr>
							<td>goku</td>
							<td>mais de 8000</td>
							<td>genki dama</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>