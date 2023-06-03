<?php
    require_once 'inc/header.php';

    if (empty($_SESSION['nome'])) header('Location: home.php');
    
    $conn = mysqli_connect('localhost', 'root', '', 'projeto_jogos');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tabela.css">
    <title>Lista de jogos</title>
</head>
<body>
    <h3>Lista de jogos cadastrados</h3>
    <?php
        if (!empty($_REQUEST['action']) && !empty($_REQUEST['id'])) {
            
            $delete = mysqli_query($conn, "DELETE FROM jogos WHERE id={$_GET['id']}");
            if ($delete)
                echo 'Registro excluído com sucesso!';
            else
                echo 'Erro ao excluir registro!';
        }
    ?>
    <a href="painel.php">voltar ao painel</a>
    <table border=1>
        <thead>
            <tr>
                <td>editar</td>
                <td>excluir</td>
                <td>id</td>
                <td>título</td>
                <td>data</td>
                <td>imagem</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                    $select = "SELECT id, nome, data_postagem, img FROM jogos ORDER BY id DESC";
                    $result = mysqli_query($conn, $select);
                ?>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <td><a href="form_jogos.php?action=edit&id=<?=$row['id']?>">editar</a></td>
                    <td><a href="listar_jogos.php?action=delete&id=<?=$row['id']?>">excluir</a></td>
                    <td><?=$row['id'];?></td>
                    <td><?=$row['nome'];?></td>
                    <td><?=$row['data_postagem'];?></td>
                    <td><img src="<?=$row['img'];?>" width="150px" height="150px"></td>
            </tr>
                <?php } ?>
        </tbody>
    </table>
    
<?php require_once 'inc/header.php'; ?>