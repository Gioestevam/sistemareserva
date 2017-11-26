<?php
    require "../../crud/crud.php";

?>
<html>
    <head>
        <meta charset ="utf-8">
        <title>Reserva Item</title>
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
                    <a href="../lib/logout.php" title="SAIR">
                        <label for="bt_sair">Sair</label>
                    </a>
                </div>
            </div>                
            <div class="container">
                <div class="head-content">
                    Cadastrar Novo Item
                </div>
				<br/>
                <?php
                    if(isset($_POST['save'])) {
						
						$item       = $_POST['item'];
						$quantidade = $_POST['quantidade'];
						$entrega    = $_POST['entrega'];
						$devolucao  = $_POST['devolucao'];
						$local      = $_POST['local'];
						
						$dataStock = dataStock($item);
						$restanteEstoque = $dataStock->remaining;
						
						$novoStock = $dataStock->remaining - $quantidade;
						
						
						if(empty($item) OR empty($quantidade) OR empty($entrega) OR empty($devolucao) OR empty($local)) {
							echo "<script>alert('Preencha todos os campos!');</script>";
						} elseif($quantidade > $restanteEstoque) {
							echo "<script>alert('A Quantidade solicitada é maior que a quantidade do estoque!');</script>";
						} else {
							updateStockforReserve($item, $novoStock);
							reserveItem($item, $quantidade, $entrega, $devolucao, $local);
							echo "<script>alert('OK!');</script>";
						}
					}
                ?>
                <form method="POST" id="form_field">
                    <div>
                        <div>
                            Selecione o item
                        </div>
                        <select name="item">
							<?php
								$getAllStock = getAllStock();
								foreach($getAllStock as $stock) {
							?>
							<option value="<?php echo $stock->id_item; ?>"><?php echo $stock->name_item; ?> (<?php echo $stock->remaining; ?>)</option>
							<?php
								}
							?>
						</select>
						<br/><small>Item (Quantidade no Estoque)</small>
                    </div>
                    <br/>
                    <div>
                        <div>
                            Quantidade
                        </div>
                        <input type="number" name="quantidade" min="1" placeholder="Quantidade do produto">
                    </div>
                    <div>
                        <div>
                            Data de Entrega
                        </div>
                        <input type="text" name="entrega" placeholder="Data de Entrega">
                    </div>
					<div>
                        <div>
                            Data de Devolução
                        </div>
                        <input type="text" name="devolucao" placeholder="Data de Devolução">
                    </div>
                    <div>
                        <div>
                            Local de utilização
                        </div>
                        <input type="text" name="local" placeholder="Local de utilização">
                    </div>
                    <div>
                        <button id="btn-success" type="submit" name="save">Reservar</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>