<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <title>Document</title>
</head>
<body>
<h3>Login</h3>
    <?php
        $class_erro_nome = $class_erro_senha = $text_color = $msg_nome = 
        $msg_senha = $incorretos = $msg_todos_campos = "";

        if (!empty($_GET['t'])) {
            $class_erro_nome = "input_erro";
            $class_erro_senha = "input_erro";
            $text_color = "text_erro";
            $msg_todos_campos = $_GET['t'];
        }

        else if (!empty($_GET['n'])) {
            $class_erro_nome = "input_erro";
            $text_color = "text_erro";
            $msg_nome = $_GET['n'];
        }

        else if (!empty($_GET['s'])) {
            $class_erro_senha = "input_erro";
            $text_color = "text_erro";
            $msg_senha = $_GET['s'];
        }

        if (!empty($_GET['ns'])) {
            $class_erro_nome = "input_erro";
            $class_erro_senha = "input_erro";
            $text_color = "text_erro";
            $incorretos = $_GET['ns'];
        }
    ?>
    <form method="POST" action="auth.php">
        <label>Nome</label>
        <input type="text" class="input <?=$class_erro_nome?>" name="nome">
        <p class="<?=$text_color?>"><?=$msg_nome?></p>

        <label>Senha</label>
        <input type="password" class="input <?=$class_erro_senha?>" name="senha">
        <p class="<?=$text_color?>"><?=$msg_senha?></p>

        <input type="submit" name="btn" value="Entrar">
        <p class="<?=$text_color?>"><?=$msg_todos_campos?></p>
        <p class="<?=$text_color?>"><?=$incorretos?></p>
    </form>
</body>
</html>