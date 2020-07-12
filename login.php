<?php

require('./autoloader.php');

$usuarios = new Usuarios();
$status = $usuarios->verificaStatus();

if($status != 0) {
	die("Você já está logado!");
}

if($_POST) {
	$destino = $usuarios->logarUsuario($_POST['usuario'], $_POST['senha']);
	die("<meta http-equiv='refresh' content='0;url=$destino'>");
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
	<title>Loja do Marcão| Login</title>
    <link rel="stylesheet" href="style/style.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<p><?php if(isset($_GET['msg']) && $_GET['msg']) { echo "<label style='color: red'>Usuário ou senha errados!</label>"; } ?></p>
<form method="POST" action="login.php" class="form">
    <div style="padding: 10px; text-align: center; font-size: 20pt;">
        <a href="index.php"><i class='fas fa-times' style="float: right; cursor: pointer; font-size: 20pt;"></i></a>
        <label>Entre com sua conta</label>
    </div>
    <label>Login:</label><br />
    <input type="text" name="usuario" placeholder="Seu usuario" /><br />
    <label>Senha:</label><br />
    <input type="password" name="senha" placeholder="Sua senha" />
    <input type="submit" value="Enviar"/>
    <p>
        Ainda não possui um cadastro?
        <a style="cursor: pointer;" href="registrar.php">Crie sua conta agora!</a>
    </p>
</form>

</body>
</html>