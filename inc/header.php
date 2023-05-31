<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/game.css">
    <link rel="stylesheet" href="css/erro.css">
    <title>Click jogos - Home</title>
</head>
<body>
    <header class="navegacao">
        <div class="area">
            <a href="home.php"><h3 id="logo">Home</h3></a>
            <form id="barra_pesquisa"action="resultados.php" method="post">
                <input id="campo_pesquisa"type="text" name="game" placeholder="Mario bros">
                <input type="submit" name="pesquisar" value="Pesquisar">
            </form>
        </div>
    </header>
