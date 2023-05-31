<?php

    if(!empty($_POST['botao'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

        $conn = mysqli_connect('localhost', 'root', '', 'projeto_jogos');
        $query = "INSERT INTO controle (nome, email, senha)
                  VALUES ('{$nome}', '{$email}', '{$senha}')";

        
        $result = mysqli_query($conn, $query);
        if($result)
            echo 'administrador cadastrado com sucesso!';
        else
            echo 'Erro!';
        
    }

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
    <form action="" method="post">
        <input type="text" name="nome"><br>
        <input type="email" name="email"><br>
        <input type="password" name="senha"><br>
        <input type="submit" name="botao" value="cadastrar">
    </form>
</body>
</html>