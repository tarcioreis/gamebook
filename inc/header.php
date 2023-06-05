<?php
    if(!isset($_SESSION))
        session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/game.css">
    <link rel="stylesheet" href="css/erro.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@100;200;300&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Gamebook</title>
</head>
<body>
    <?php if(!empty($_SESSION['nome'])) {?>
    <header class="navegacao">
        <div class="area">
            <a href="painel.php"><h3 id="logo">Gamebook | Admin | <?=$_SESSION['nome']?></h3></a>
            <form id="barra_pesquisa"action="resultados.php" method="post">
                <input type="text" name="game" placeholder="Mario bros">
                <input type="submit" name="pesquisar" value="Pesquisar">
            </form>
        </div>
    </header>
    <?php } else { ?>
        <header class="navegacao">
        <div class="area">
            <a href="home.php"><h3 id="logo"><span>Gamebook</span></h3></a>
            <form id="barra_pesquisa"action="resultados.php" method="post">
                <input id="campo_pesquisa"type="text" name="game" placeholder="Mario bros">
                <input type="submit" name="pesquisar" value="Pesquisar">
            </form>
        </div>
    </header>
    <?php } ?>