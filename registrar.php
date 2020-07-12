<?php

require('./autoloader.php');

$usuarios = new Usuarios();
$status = $usuarios->verificaStatus();

if($status != 0) {
	die('Você já está registrado!');
}

if($_POST) {
	$usuarios->criarUsuario($_POST['usuario'], $_POST['senha'], 0);
	die('<meta http-equiv="refresh" content="0;url=index.php">');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
	<title>Loja do Marcão| Registro</title>
    <link rel="stylesheet" href="style/style.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<form method="post" action="registrar.php" class="form">
    <div style="padding: 10px; text-align: center; font-size: 20pt;">
       <a href="index.php"> <i class='fas fa-times' style="float: right; cursor: pointer; font-size: 20pt;"></i></a>
        <label>Crie sua conta</label>
    </div>
    <label>Nome</label><br />
    <input type="text" placeholder="Nome Completo" /><br />
    <label>Login</label><br />
    <input type="text" name="usuario" placeholder="Seu usuario" /><br />

    <label>Telefone</label><br />
    <input type="tel" placeholder="Telefone" /><br />

    <label>CPF</label><br />
    <input type="text" placeholder="CPF" /><br />

    <label>Senha:</label><br />
    <input type="password" name="senha" placeholder="Sua senha" />
    <input type="submit" value="Registrar"/>
    <p>
        Realizando seu cadastro você concorda com todos os
        <a style="cursor: pointer;">termos e condições.</a>
    </p>
</form>

</body>
</html>