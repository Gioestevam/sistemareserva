<?php
    require "../../crud/crud.php";

?>
<html>
    <head>
        <meta charset ="utf-8">
        <title>Adicionar Items</title>
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
                <div class="head-content">
                    Cadastrar Novo Item
                </div>
                <div id="backtostock">
                    <a href="stock.php">Voltar para o estoque</a>
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
                <form method="POST" id="form_field">
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
                        <input id="btn-success" type="submit" name="cadastrar_item" value="Cadastrar Item">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>