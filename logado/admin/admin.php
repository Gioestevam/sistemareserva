<?php
	require_once("../../config.php");
	if($_SESSION['logged'] == "no-logged") {
		header("Location: index.php");
		exit;
	}
?>
<html>
	<head>
		<meta charset ="utf-8">
		<title>Administrador</title>
		<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
	</head>
	<body>
		<div class="body_logged">
			<div id="toolbar">
				<div class="logo">
					<a href="index.php">
						<img class="imgfaclogo" src="http://bit.ly/2yMoENh">
					</a>
				</div>
				<div class="menu-toolbar">
					<nav class="menu">
						<ul>
							<li>
								<a href="../lib/profile.php">
									<span class="icon-profile"></span>
									Perfil
								</a>
							</li>
							<li>
								<a href="../lib/user.php">
									<span class="icon-user"></span>
									Usuários
								</a>
							</li>
							<li>
								<a href="../lib/add_reserve.php">
									<span class="icon-reserve"></span>
									Reservar
								</a>
							</li>
							<li>
								<a href="../lib/stock.php">
									<span class="icon-stock"></span>
									Estoque
								</a>
							</li>
							<li>
								<a href="../lib/stats.php">
									<span class="icon-stats"></span>
									Estatisticas
								</a>
							</li>
						</ul>
					</nav>
				</div>
				<div class="logout">
					<a href="../lib/logout.php" title="SAIR">
						<label for="bt_sair">Sair</label>
					</a>
				</div>
			</div>
			<div class="container">
				<table>
					<thead> 
						<div class="head-content">
							Reservados
						</div>             
						<tr>
							<?php
								echo $status;
							?>
							<th>Número do pedido</th>
							<th>Data de pedido:</th>
							<th>Data de Entrega:</th>
							<th>Data de Devolução:</th>
							<th>Itens do Pedido:</th>
							<th>Local de Entrega:</th>
							<th>Solicitante:</th>
						</tr>
					</thead>
					<tbody id="content-table">
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