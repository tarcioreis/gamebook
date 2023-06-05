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
    <link rel="stylesheet" href="css/form.css">
    <title>Gamebook</title>
</head>
<body>
    <header class="navegacao">
        <div class="area">
            <a href="painel.php"><h3 id="logo">Gamebook | Admin |  - <?=$_SESSION['nome']?></h3></a>
        </div>
    </header>
