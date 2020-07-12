<?php

require('./autoloader.php');

$usuarios = new Usuarios();
$produtos = new Produtos();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Loja do Marcão e do Jarbas</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style/style.css" />
    <script type="text/javascript" src="script/script.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<div id="container">
    <body>
    <div class="view-produtos">
        <div style="padding: 10px; text-align: center; font-size: 20pt;">
            <a href="index.php"><i class='fas fa-times'
                                   style="float: right; color: #cccccc; cursor: pointer; font-size: 30pt;"></i></a>
        </div>
        <div class="view-produtos-tittle">
            Confira os produtos que encontramos para você
        </div>
        <div id="container">
            <table>
                <?php
                $list = $produtos->listarProdutos('', '', '', $_GET['busca'], '6','');
                foreach($list as $produto) {
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

                if($list == null)
                {
                    echo '
                    <div style="color: #cccccc; font-size: 20pt">
                    Poxa, sua busca não deu nenhum resultado :(
                    </div>';
                }
                ?>
            </table>
        </div>
    </div>
    </body>
</div>
</html>