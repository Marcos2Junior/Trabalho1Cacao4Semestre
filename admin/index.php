<?php

require('../autoloader.php');

$usuarios = new Usuarios();
$produtos = new Produtos();
$status = $usuarios->verificaStatus();
$db = new Database;

if($status != 2) {
	die('Você não possui acesso a esta área');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
	<title>Loja do Marcão e do Jarbas | Painel de Controle</title>
    <link rel="stylesheet" href="../style/style.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>


    <div class="viewindexadmin">
        <h1>Usuários</h1>
        <a href='criarUsuario.php'>Criar usuário</a><br /><br />
        <table cellspacing="2" cellpadding="5" border="1">
	<tr>
		<th>ID</th>
		<th>Usuário</th>
		<th>Opções</th>
	</tr>
	<?php
		foreach($usuarios->listarUsuarios() as $usuario) {
			echo "<tr>";
			echo "<td>" . $usuario['id'] . "</td>\n";
			echo "<td>" . $usuario['usuario'] . "</td>\n";
			echo "<td><a href='alterarUsuario.php?id=" . $usuario['id'] . "'>Alterar</a> - <a href='removerUsuario.php?id=" . $usuario['id'] . "'>Remover</a></td>\n";
			echo "</tr>";
		}
	?>
        </table>
    </div>

    <div class="viewindexadmin">
        <h1>Produtos</h1>
        <a href='criarProduto.php'>Criar produto</a><br /><br />
        <table cellspacing="2" cellpadding="5" border="1">
	<tr>
		<th>ID</th>
		<th>Produto</th>
		<th>Opções</th>
	</tr>
	<?php
		foreach($produtos->listarProdutos('', '', '', '', '') as $produto) {
			echo "<tr>";
			echo "<td>" . $produto['id'] . "</td>\n";
			echo "<td>" . $produto['titulo'] . "</td>\n";
			echo "<td><a href='alterarProduto.php?id=" . $produto['id'] . "'>Alterar</a> - <a href='removerProduto.php?id=" . $produto['id'] . "'>Remover</a></td>\n";
			echo "</tr>";
		}
	?>
        </table>
    </div>

<div class="navAdmin">
    <a href="../index.php">Voltar ao site</a> &nbsp;&nbsp; || &nbsp;&nbsp;
    <a href="../logout.php">Desconectar</a>
</div>
</body>
</html>