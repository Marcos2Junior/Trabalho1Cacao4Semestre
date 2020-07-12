<?php

require('./autoloader.php');

$usuarios = new Usuarios();
$status = $usuarios->verificaStatus();
$db = new Database;
$valor = '';


if($status == 0) {
	die('Você não possui acesso a esta área');
}

if(empty($_SESSION['uid'])) {
	die('<meta http-equiv="refresh" content="0;url=index.php">');
} else {
	$id = $_SESSION['uid'];
}

if($_POST) {
    $valor = $usuarios->alterarUsuario($id, $_POST['usuario'],
        $_POST['senha'], $_POST['confsenha'], $_POST['senhaatual'], 0);
}

$usuario = $db->pegarDado("usuarios", "*", "id = $id");

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
	<title>Loja do Marcão | Minha conta</title>
    <link rel="stylesheet" href="style/style.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<?php echo '<p>Olá <span style="font-size: x-large">'. $_SESSION['user'].'</span>, Seja bem vindo!';

if($status == 2)
{
    echo '<br><br><a href="admin/index.php" 
    style="font-size: large; color: white">Clique para acessar Administrativo</a></p>';
}
else
{
    echo '</p>';
}
?>
<form method="POST" action="conta.php?id=<?php echo $id; ?>" class="form">
    <div style="padding: 10px; text-align: center; font-size: 20pt;">
        <a href="index.php"><i class='fas fa-times' style="float: right; cursor: pointer; font-size: 20pt;"></i></a>
        <label>Minha conta</label>
    </div>
    <?php
    if(!empty($valor))
    {
        echo '<br><div style="text-align: center">
        <label style="color: darkturquoise; font-size: x-large"> '. $valor .'</label>
        </div><br><br>';
    }
     ?>
    <label>Alterar dados</label><br><br>
    <label>Seu novo Login :</label><br />
    <input type="text" name="usuario" value="<?php echo $usuario['usuario']; ?>"
           placeholder="Seu novo login de acesso" /><br />
    <label>Confirme sua senha atual:</label><br />
    <input type="password" name="senhaatual" placeholder="Sua senha atual" />
    <label>Sua nova senha:</label><br />
    <input type="password" name="senha" placeholder="Sua nova senha de acesso" />
    <label>Confirme sua nova senha:</label><br />
    <input type="password" name="confsenha" placeholder="Sua nova senha de acesso" />
    <input type="submit" value="Enviar"/>
    <p>
        Deseja deslogar?
        <a style="cursor: pointer;" href="logout.php">Clique aqui!</a>
    </p>
</form>

</body>
</html>