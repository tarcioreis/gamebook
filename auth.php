<?php
    
    if (empty($_POST['nome']) && empty($_POST['senha']))
        header('Location: login.php?t=Preencha todos os campos!');
    else if (empty($_POST['nome']))
        header('Location: login.php?n=Digite seu nome');
    else if (empty($_POST['senha']))
        header('Location: login.php?s=Digite sua senha');
    else {
        $nome = htmlspecialchars($_POST['nome']);
        $senha = htmlspecialchars($_POST['senha']);
        
        $conn = mysqli_connect('localhost', 'root', '', 'projeto_jogos');
        $result = mysqli_query($conn, "SELECT * FROM controle WHERE nome='{$nome}'");
        if($result) {
            $row = mysqli_fetch_assoc($result);
            if(password_verify($senha, $row['senha'])) {
                session_start();
                $_SESSION['nome'] = $nome;
                $_SESSION['email'] = $row['email'];
                header('Location: painel.php');
            } else
                header('Location: login.php?ns=Nome ou senha incorretos!');
        }
    }
    