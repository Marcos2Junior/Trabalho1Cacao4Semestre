<?php

require('../autoloader.php');

$usuarios = new Usuarios();
$produtos = new Produtos();
$status = $usuarios->verificaStatus();
$db = new Database;

if($status != 2) {
	die('Voce nao possui acesso a esta area');
}

if(empty($_GET['id'])) {
	die('<meta http-equiv="refresh" content="0;url=index.php">');
} else {
	$id = $_GET['id'];
}

if($_POST) {
	$produtos->alterarProduto($id, $_POST);
	die('<meta http-equiv="refresh" content="0;url=index.php">');
}

$produto = $db->pegarDado("produtos", "*", "id = $id");

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
	<title>Loja do Marcão | Alterar produto</title>
</head>
<body>
<h1>Alterar produto</h1>

<form method="POST" action="alterarProduto.php?id=<?php echo $id; ?>">
	<label>Titulo</label>
	<input type="text" name="titulo" value="<?php echo $produto['titulo']; ?>" /><br /><br />

	<label>Preço</label>
	<input type="text" name="preco" value="<?php echo $produto['preco']; ?>" /><br /><br />

    <label>Preço antigo</label>
    <input type="text" name="valorold" value="<?php echo $produto['valorold']; ?>" /><br /><br />

    <label>Imagem</label>
    <input type="file" name="caminho" value="<?php echo $produto['caminho']; ?>" /><br /><br />
	
	<input type="submit" value="Enviar" />
</form>

</body>
</html>