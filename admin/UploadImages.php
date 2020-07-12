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

$produto = $db->pegarDado("produtos", "*", "id = $id");

?>

<html>
<head>
    <title>Loja do Marcão e do Jarbas | Upload de imagens</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
<div class="container form">
    <form method="POST" enctype="multipart/form-data">
        <div style="padding: 10px; text-align: center; font-size: 20pt;">
            <a href="index.php"><i class='fas fa-times' style="float: right; cursor: pointer; font-size: 20pt;"></i></a>
            <h2><strong>Atualizar imagem</strong></h2><hr>
        </div>
        <label>Nome</label>
        <input type="text" disabled value="<?php echo $produto['titulo']; ?>">
<label>Imagem atual</label><br>
        <img src="../images/<?php echo $produto['caminho']; ?>" class="img img-responsive img-thumbnail" width="200">
        <br>
        <label for="conteudo">Enviar imagem:</label>
        <input type="file" name="pic" accept="image/*" >

        <div align="center">
            <button type="submit" class="btn btn-success">Enviar imagem</button>
        </div>
    </form>

    <hr>

    <?php
    if(isset($_FILES['pic']))
    {
        $ext = pathinfo($_FILES['pic']['name'], PATHINFO_EXTENSION); //Pegando extensão do arquivo
        $new_name = date("Y.m.d-H.i.s") . '.'. $ext; //Definindo um novo nome para o arquivo
        $dir = '../images/'; //Diretório para uploads

        move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
        $dados = ['id' => $id, 'caminho' => $new_name];

        $produtos->alterarProduto($id, $dados);
        echo '<div class="alert alert-success" role="alert" align="center">
          <img src="../images/' . $new_name . '" class="img img-responsive img-thumbnail" width="200"> 
          <br>
          Imagem enviada com sucesso!
          <br>';
    } ?>

</div>
<body>
</html>