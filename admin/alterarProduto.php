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
    <link rel="stylesheet" href="../style/style.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<form method="POST" action="alterarProduto.php?id=<?php echo $id; ?>" class="form">
    <div style="padding: 10px; text-align: center; font-size: 20pt;">
        <a href="index.php"><i class='fas fa-times' style="float: right; cursor: pointer; font-size: 20pt;"></i></a>
        <label>Alterar produto</label>
    </div>
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