<?php

require('../autoloader.php');

$usuarios = new Usuarios();
$status = $usuarios->verificaStatus();
$db = new Database;

if($status != 2) {
	die('Você não possui acesso a esta área');
}

if(empty($_GET['id'])) {
	die('<meta http-equiv="refresh" content="0;url=index.php">');
} else {
	$id = $_GET['id'];
}

if($_POST) {
	$usuarios->alterarUsuario($id, $_POST['usuario'], $_POST['senha'], $_POST['admin']);
	die('<meta http-equiv="refresh" content="0;url=index.php">');
}

$usuario = $db->pegarDado("usuarios", "*", "id = $id");

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
	<title>Loja do Marcão | Alterar usuário</title>
</head>
<body>
<h1>Alterar usuário</h1>

<form method="POST" action="alterarUsuario.php?id=<?php echo $id; ?>">
	<label>Usuário</label>
	<input type="text" name="usuario" value="<?php echo $usuario['usuario']; ?>" /><br /><br />
	
	<label>Senha</label>
	<input type="password" name="senha" value="" /><br /><br />
	
	<label>Administrador?</label>
	<select name="admin">
		<option value="1" <?php if($usuario['admin'] == 1) { echo 'selected="selected"'; } ?>>Sim</option>
		<option value="0" <?php if($usuario['admin'] == 0) { echo 'selected="selected"'; } ?>>Não</option>
	</select><br /><br />
	
	<input type="submit" value="Enviar" />
</form>

</body>
</html>