<?php
    require "../../crud/crud.php";

?>
<html>
    <head>
        <meta charset ="utf-8">
        <title>Adicionar Items</title>
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
                Estoque
                <!-- ou nome da pagina atual  -->
            </div>
            <div class="absoluteimgsair">
                <a href="link-de-saida" title="SAIR">
                    <label for="bt_sair">Sair &#x27A8; </label>
                </a>
            </div>
            <div class="divprincipal">
                <div>
                    <a href="stock.php">Voltar para o estoque</a>
                </div>
                <div>
                    <input type="search" name="search">
                </div>
                <div>
                    Cadastrar Novo Item
                </div>
                <?php
					if(isset($_POST['cadastrar_item'])) {
						
						$code_item        = $_POST['code_item'];
						$name_item        = $_POST['name_item'];
						$amount_item      = $_POST['amount_item'];
						$description_item = $_POST['description_item'];
						$conteudo_item    = $_POST['img_item'];
						
						if(empty($code_item) OR empty($name_item) OR empty($amount_item) OR empty($description_item) OR empty($conteudo_item)) {
							echo "<script>alert('Preencha todos os campos!');</script>";
						} else {
							insertStock($code_item, $name_item, $amount_item, $description_item, $conteudo_item);
							echo "<script>alert('Sucesso!!!');</script>";
						}
						
					}
                ?>
                <form method="POST">
                    <div>
                        <div>
                            Codigo do item
                        </div>
                        <input type="text" name="code_item" placeholder="Digite o código do item">
                    </div>
                    <div>
                        <div>
                            Nome do Item
                        </div>
                        <input type="text" name="name_item" placeholder="Digite o nome do Item">
                    </div>
                    <div>
                        <div>
                            Descrição do Item
                        </div>
                        <input type="text" name="description_item" placeholder="Digite a descrição do item">
                    </div>
                    <div>
                        <div>
                            Quantidade de itens
                        </div>
                        <input type="number" name="amount_item" min="1" placeholder="Digite a quantidade dos itens">
                    </div>
                    <div>
                        <div>
                            Imagen do Item
                        </div>
                        <input type="file" name="img_item">
                    </div>
                    <div>
                        <input type="submit" name="cadastrar_item" value="Cadastrar Item">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>