<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(isset($_SESSION['nome'])) { ?>
        <h3>Painel administrativo - <?=$_SESSION['nome']?></h3>
        <a href="home.php">home</a>
        <a href="form_jogos.php">cadastrar jogo</a>
        <a href="listar_jogos.php">listar jogos</a>
        <a href="logout.php">logout</a>
    <?php } ?>
    <?php if(!isset($_SESSION['nome'])) header('Location: home.php'); ?>
</body>
</html>