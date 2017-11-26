<?php
  require "../../config.php";
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
          Meu perfil
        </div>
        <div>
          <form method="POST" id="form_field">
            <div>
              <div>
                Nome de usuário:
              </div>
              <input type="text" name="" placeholder="">
            </div>
            <div>
              <div>
                Nome Completo:
              </div>
              <input type="text" name="" placeholder="">
            </div>
            <div>
              <div>
                Cpf:
              </div>
              <input type="text" name="" placeholder="">
              </div>
            <div>
              <div>
                Email:
              </div>
              <input type="text" name="" placeholder="">
            </div>
            <div>
              <div>
                Senha:
              </div>
              <input type="text" name="" placeholder="">
            </div>
            <div>
              <button id="btn-success" type="submit" name="save">Atualizar Perfil</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>