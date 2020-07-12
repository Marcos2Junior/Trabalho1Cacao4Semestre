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
	$usuarios->alterarUsuarioAdmin($id, $_POST['usuario'], $_POST['senha'], $_POST['admin']);
	die('<meta http-equiv="refresh" content="0;url=index.php">');
}

$usuario = $db->pegarDado("usuarios", "*", "id = $id");

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
	<title>Loja do Marcão e do Jarbas | Alterar usuário</title>
    <link rel="stylesheet" href="../style/style.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>

<form method="POST" action="alterarUsuario.php?id=<?php echo $id; ?>" class="form">
    <div style="padding: 10px; text-align: center; font-size: 20pt;">
        <a href="index.php"><i class='fas fa-times' style="float: right; cursor: pointer; font-size: 20pt;"></i></a>
        <label>Editar usuário</label>
    </div>
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