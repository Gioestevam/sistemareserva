<?php
    require "../../crud/crud.php";

?>
<html>
    <head>
        <meta charset ="utf-8">
        <title>Reserva Item</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/design.css">
    </head>
    <body>
        <div class="cor">
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
                Reservar Item
                <!-- ou nome da pagina atual  -->
            </div>
            <div class="absoluteimgsair">
                <a href="link-de-saida" title="SAIR">
                    <label for="bt_sair">Sair &#x27A8; </label>
                </a>
            </div>
            <div class="divprincipal">
                <div>
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
						
						echo $novoStock;
						
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
                <form method="POST">
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
                        <button type="submit" name="save">Reservar</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>