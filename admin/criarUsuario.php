<?php

require('../autoloader.php');

$usuarios = new Usuarios();
$status = $usuarios->verificaStatus();
$db = new Database;

if($status != 2) {
	die('Você não possui acesso a esta área');
}

if($_POST) {
	$usuarios->criarUsuario($_POST['usuario'], $_POST['senha'], $_POST['admin']);
	die('<meta http-equiv="refresh" content="0;url=index.php">');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
	<title>Loja do marcão | Criar usuário</title>
</head>
<body>
<h1>Criar usuário</h1>

<form method="POST" action="criarUsuario.php">
	<label>Usu�rio</label>
	<input type="text" name="usuario" /><br /><br />
	
	<label>Senha</label>
	<input type="password" name="senha" /><br /><br />
	
	<label>Administrador?</label>
	<select name="admin">
		<option value="1">Sim</option>
		<option value="0">N�o</option>
	</select><br /><br />
	
	<input type="submit" value="Enviar" />
</form>

</body>
</html>