<?php
	require_once("../../config.php");
	if($_SESSION['logged'] == "no-logged") {
		header("Location: /index.php");
		exit;
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
							<td>Número do pedido</td>
							<td>Data de pedido:</td>
							<td>Data de Entrega:</td>
							<td>Data de Devolução:</td>
							<td>Itens do Pedido:</td>
							<td>Local de Entrega:</td>
							<td>Solicitante:</td>
						</tr>
					</thead>
					<tbody>
						<?php
							$getPedidos = getReserve();
							foreach($getPedidos as $pedido) {
								
								// getDataStock
								$getDataStock = getDataStock($pedido->item);
								
								// getDataUserStock
								
								$getDataUserStock = getDataUserStock($pedido->user);
						?>
						<tr>
							<td><?php echo $pedido->id_reserve; ?></td>
							<td><?php echo date('d/m/Y', $pedido->date_reserve); ?></td>
							<td><?php echo $pedido->delivery_reserve; ?></td>
							<td><?php echo $pedido->devolution; ?></td>
							<td><?php echo $getDataStock->name_item ." (". $pedido->quantidade .")" ?></td>
							<td><?php echo $pedido->local_reserve; ?></td>
							<td><?php echo $getDataUserStock->full_name_user; ?></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>