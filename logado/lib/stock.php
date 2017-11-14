<?php
    require "../../config.php";
?>

<html>
    <head>
        <meta charset ="utf-8">
        <title>Estoque</title>
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
                    <a href="add_stock.php">Adicionar novo Itens</a>
                </div>
                <div>
                    <input type="search" name="search">
                </div>
                <table>
                  <thead>               
                    <tr>
                      <td>Codigo</td>
                      <td>Nome</td>
                      <td>Descrição</td>
                      <td>Quantidade</td>
                      <td>Opção</td>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        read_stock();
                      ?>
                  </tbody>
                </table>
            </div>
    </div>

</body>

</html>