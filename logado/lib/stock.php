<?php
    require "../../config.php";
?>

<html>
    <head>
        <meta charset ="utf-8">
        <title>Estoque</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    </head>
    <body>
        <div class="body_logged">
            <div id="toolbar">
                <div class="logo">
                    <a href="../admin/admin.php">
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
                    <a href="logout.php" title="SAIR">
                        Sair
                    </a>
                </div>
            </div>         
            <div class="container">
                <table>
                    <thead>
                        <div class="head-content">
                            Estoque
                        </div>
                        <div id="add-stock">
                            <a href="add_stock.php">
                              <span class="icon-addstock"></span>
                              Adicionar Itens no Estoque
                            </a>
                        </div>              
                        <tr>
                            <th>Codigo</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Quantidade</th>
				            <th>Restante</th>
                            <th>Opção</th>
                        </tr>
                    </thead>
				    <br/>
                    <tbody>
    					<?php
    						$getStock = getStock();
    						foreach($getStock as $stock) {
    					?>
                        <tr>
    						<td><?php echo $stock->code_item; ?></td>	
    						<td><?php echo $stock->name_item; ?></td>
    						<td><?php echo $stock->description_item; ?></td>
    						<td><?php echo $stock->amount_item; ?></td>
    						<td><?php echo $stock->remaining; ?></td>
    						<td>
    							<a href="update.php?edit_id=<?php echo $stock->id_item; ?>">Atualizar</a>
    							<a href="delete.php?del_id=<?php echo $stock->id_item; ?>">Delete</a>
    						</td>
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