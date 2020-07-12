<?php

require('./autoloader.php');

$usuarios = new Usuarios();
$produtos = new Produtos();
$carrinho = new Carrinho();
$status = $usuarios->verificaStatus();
$db = new Database;

if($status == 0) {
	die('Você precisa estar logado para comprar algum produto. Portanto, <a href="login.php">Faça login</a>');
}

if(isset($_GET['adiciona'])) {
	$carrinho->adicionarProduto($_GET['adiciona']);
}

if(isset($_POST['esvaziar'])) {
	$carrinho->esvaziarCarrinho();
}

if(isset($_POST['atualizar'])) {
	// Para cada produto em nosso carrinho, chamaremos o método de alteração de quantidade
	foreach($_POST['produto'] as $chave => $produto) {
		$carrinho->alterarQuantidade($produto, $_POST['quantidade'][$chave]);
	}
	
	// Caso o checkbox de remoção tenha sido marcado
	if(isset($_POST['remover'])) {
		// Itere entre os valores marcados e chame o método de remoção com o value do checkbox
		foreach($_POST['remover'] as $produto) {
			$carrinho->removerProduto($produto); 
		}
	}
}

if(isset($_POST['compra'])) {

	foreach($_POST['produto'] as $key => $value) {
		$quantidade = $_POST['quantidade'][$key];
		$produto = $db->pegarDado("produtos", "*", "id = $value");
		
		// Criamos um dado pré-formatado com informações da compra. A partir daqui, podemos chamar um método de uma classe de boleto, cartão ou PagSeguro
		$compras[] = "[". $_SESSION['user'] ."-". $quantidade ."-". $produto['id'] ."-". $produto['titulo'] ."-". $produto['preco'] ."]";
	}
	
	$compras = implode(', ', $compras); // Unimos nossos dados pré-formatados, separados por vírgulas, para cada produto comprado
	$carrinho->esvaziarCarrinho();
	die("Compramos os itens: $compras"); // Mostramos na tela os itens comprados
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
	<title>Loja do Marcão | Carrinho de compras</title>
    <link rel="stylesheet" href="style/style.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
	<?php
		echo '<form method="POST" action="carrinho.php" class="form">
    
        <div style="padding: 10px; text-align: center; font-size: 20pt;">
            <a href="index.php"><i class=\'fas fa-times\' style="float: right; cursor: pointer; font-size: 20pt;"></i></a>
            <label>Olá '. $_SESSION['user'] .'!<br> Esse é o seu Carrinho de compras</label>
        </div>';
        if(isset($_SESSION['compras'])) {
            $total = 0;
        echo '
		<table cellspacing="2" cellpadding="4">
		    <tr>
            <th>Nome</th>
            <th>Quantidade</th>
            </tr>';
		    foreach($carrinho->listarProdutos() as $produto) {
			    $total += $produto['preco'] * $produto['quantidade'];
			    echo "<tr>";
			    echo "<td><strong>" . $produto['titulo'] . "</strong><input type='hidden' name='produto[]' value='" . $produto['id'] . "' /></td>\n";
			    echo "<td><input type='number' max='10' min='1' name='quantidade[]' value='" . $produto['quantidade'] . "' /></td>\n";
			    echo "<td><input type='checkbox' name='remover[]' value='" . $produto['id'] . "' /></td>\n";
			    echo "</tr>";
		    }
		
		echo "<tr><td colspan='2' align='right'><strong>Total:</strong> R$ $total</td></tr>";
		echo '<tr><td colspan="2" align="right"><input type="submit" name="compra" value="Finalizar compra" /> <input type="submit" name="esvaziar" value="Esvaziar carrinho" /> <input type="submit" name="atualizar" value="Atualizar carrinho" /></td></tr></table>';
	} else {
		echo "<p>Não há nada no carrinho.</p>";
	}
	?>
</form>
</body>
</html>