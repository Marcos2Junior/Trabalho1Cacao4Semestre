<?php

require('../autoloader.php');

$usuarios = new Usuarios();
$produtos = new Produtos();
$status = $usuarios->verificaStatus();
$db = new Database;

if($status != 2) {
	die('Você não possui acesso a esta área');
}

if($_POST) {

    $uploaddir = '/images/';
    $uploadfile = $uploaddir . basename($_FILES['caminho']['name']);
    move_uploaded_file($_FILES['caminho']['tmp_name'], $uploadfile);

	$produtos->criarProduto($_POST);
	die('<meta http-equiv="refresh" content="0;url=index.php">');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
	<title>Loja do Marcão | Criar produto</title>
    <link rel="stylesheet" href="../style/style.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<form method="POST" action="criarProduto.php" class="form">
    <div style="padding: 10px; text-align: center; font-size: 20pt;">
        <a href="index.php"><i class='fas fa-times' style="float: right; cursor: pointer; font-size: 20pt;"></i></a>
        <label>Criar Produto</label>
    </div>

	<label>Nome</label>
	<input type="text" name="titulo" /><br /><br />
	
	<label>Preço</label>
	<input type="text" name="preco" /><br /><br />

    <label>Preço antigo</label>
    <input type="text" name="valorold" /><br /><br />

    <label>Grupo</label>
    <input type="number" min="1" max="2" name="grupo" /><br /><br />
	
	<input type="submit" value="Enviar" />
</form>

</body>
</html>