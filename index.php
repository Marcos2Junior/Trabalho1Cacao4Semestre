<?php

require('./autoloader.php');

$usuarios = new Usuarios();
$produtos = new Produtos();
$status = $usuarios->verificaStatus();

if($status == 0) {
$login = 'Você não está logado. Clique <a href="login.php">aqui</a> para logar, ou <a href="registrar.php">registre-se!</a>';
} elseif($status == 1) {
$login = 'Olá '. $_SESSION['user'] .'! <a href="carrinho.php">Meu carrinho</a> | <a href="conta.php">Minha conta</a> | <a href="logout.php">Sair</a> |';
} else {
$login = 'Olá '. $_SESSION['user'] .'! <a href="carrinho.php">Meu carrinho</a> | <a href="conta.php">Minha conta</a> | <a href="admin/">Admin</a> | <a href="logout.php">Sair</a>';
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Loja do Marcão</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style/style.css" />
    <script type="text/javascript" src="script/script.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <div id="container">
    <body>
      <div class="navbar">
        <div class="logo"><label> LOJA DO MARCÃO </label><br /></div>
        <div class="slogan">
          <label>Porque você merece o melhor, experimente!</label>
        </div>
        <ul>
          <li>
            <a href="~/../Index.html"
              ><i class="fas fa-home"></i> &nbsp;Inicio</a
            >
          </li>
          <li>
            <a href="#"><i class="fas fa-splotch"></i> &nbsp;Novidades</a>
          </li>
          <li>
            <a href="#"><i class="far fa-envelope"></i> &nbsp;Fale conosco</a>
          </li>

          <li style="float: right; margin-right: 30px; cursor: pointer;">
              <?php
              if($status == 0)
                  {
                      echo '<a href="login.php"><i class="fas fa-user"></i> &nbsp;Login</a>';
                  }
              else
              {
                  echo '<a href="conta.php"><i class="fas fa-user"></i> &nbsp;Minha conta</a>';
              }
            ?>
          </li>
          <li style="float: right;">
            <a href="carrinho.php"
              ><i class="fas fa-shopping-cart"></i> &nbsp;Meu carrinho</a
            >
          </li>
          <form class="nav-search">
            <input type="text" placeholder="&nbsp;O que você deseja?" />
            <button>
              <i class="fas fa-search" style="color: white;"></i>
              &nbsp;Buscar
            </button>
          </form>
        </ul>
      </div>
      <div class="view-produtos">
        <div class="view-produtos-tittle">
          Confira essas ofertas que separamos para você
        </div>
        <div id="container">

          <table>
            <?php
		foreach($produtos->listarProdutos('', '', '', '', '6',1) as $produto) {
          echo '<a href="carrinho.php?adiciona='. $produto['id']. '"<div class="view-produtos-tag box">
            <div class="div-coracaozinho">
              <i class="fas fa-heart" style="font-size: 30px; color: red;"></i>
            </div>';
            echo '<img src="~/../images/'.$produto['caminho'] .'" />';
            echo '<label>'. $produto['titulo'] . '</label><br />';
            echo '<hr />';
            echo '<strike>R$' . $produto['valorold'] . '</strike> <span>R$'.$produto['preco'].'</span> <br />';
            echo '<strong>Até 10x SEM JUROS!</strong>
          </div></a>';
            }
            ?>
          </table>
        </div>

        <div class="view-exibe-meio-produtos">
          <div id="container">
            <div class="box">
              <i
                class="fas fa-shield-alt"
                style="font-size: 40px; margin: 10px;"
              ></i
              >Compre com segurança
            </div>
            <div class="box">
              <i
                class="far fa-thumbs-up"
                style="font-size: 40px; margin: 10px;"
              ></i
              >Loja Super legal
            </div>
            <div class="box">
              <i class="fas fa-truck" style="font-size: 40px; margin: 10px;"></i
              >Frete Grátis
            </div>
          </div>
        </div>

        <div class="view-produtos-tittle">
          Nossos produtos mais comprados
        </div>
        <div id="container">
        <table>
            <?php
            foreach($produtos->listarProdutos('', '', '', '', '6', 2) as $produto) {
                echo '<a href="carrinho.php?adiciona='. $produto['id']. '"<div class="view-produtos-tag box">
            <div class="div-coracaozinho">
              <i class="fas fa-heart" style="font-size: 30px; color: red;"></i>
            </div>';
                echo '<img src="~/../images/'.$produto['caminho'] .'" />';
                echo '<label>'. $produto['titulo'] . '</label><br />';
                echo '<hr />';
                echo '<strike>R$' . $produto['valorold'] . '</strike> <span>R$'.$produto['preco'].'</span> <br />';
                echo '<strong>Até 10x SEM JUROS!</strong>
          </div></a>';
            }
            ?>
            </table>
        </div>
      </div>
    </body>
    <footer>
      <div id="container">
        <div class="box div-footer">
          <label>Precida de ajuda?</label>
          <ul>
            <li><a href="#">Dúvidas frequentes</a></li>
            <li><a href="#">Tempo de entrega</a></li>
            <li><a href="#">Trocas e devoluções</a></li>
            <li><a href="#">Central de relacionamentos</a></li>
            <li><a href="#">Regras de voucher</a></li>
            <li><a href="#">Contrato de compra e venda</a></li>
          </ul>
        </div>
        <div class="box div-footer">
          <label>SOBRE NÓS</label>
          <ul>
            <li><a href="#">Quem somos</a></li>
            <li><a href="#">Política de privacidade</a></li>
            <li><a href="#">Termos de uso</a></li>
            <li><a href="#">Seja um parceiro marketplace</a></li>
            <li><a href="#">Programa de afiliados</a></li>
            <li><a href="#">Anuncie conosco</a></li>
          </ul>
        </div>
        <div class="box div-footer">
          <div class="div-footer-icons">
            <label>FORMAS DE PAGAMENTO</label><br /><br />
            <i class="fab fa-cc-paypal"></i>
            <i class="fab fa-cc-visa"></i>
            <i class="fab fa-cc-mastercard"></i>
            <i class="fab fa-cc-diners-club"></i>
            <i class="fab fa-cc-discover"></i>
            <i class="fab fa-cc-jcb"></i>
          </div>
          <div class="seguranca">
            <i class="fas fa-user-shield"></i>
            <p>Seus dados seguros</p>
          </div>
          <div class="seguranca">
            <i class="fas fa-shield-alt"></i>
            <p>Site com criptografia SSL</p>
          </div>
        </div>
      </div>
      <hr />
      <div class="label-footer box">
        <label>
          COPYRIGHT © 2020 TODOS OS DIREITOS RESERVADOS. - LOJA DO MARCÃO
        </label>
      </div>
      <div class="label-footer-icons box">
        <a href="https://www.instagram.com/maajunioor/" target="_blank"
          ><i class="fab fa-instagram"></i
        ></a>
        <a href="https://github.com/Marcos2Junior" target="_blank"
          ><i class="fab fa-github"></i
        ></a>
        <a href="https://www.facebook.com/MarcosJuunior2/" target="_blank"
          ><i class="fab fa-facebook"></i
        ></a>
        <a href="https://open.spotify.com/user/gluguer" target="_blank"
          ><i class="fab fa-spotify"></i
        ></a>
        <a
          href="https://api.whatsapp.com/send?phone=5514981448487"
          target="_blank"
          ><i class="fab fa-whatsapp"></i
        ></a>
      </div>
    </footer>
  </div>
</html>
