<?php
    // Variáveis vazias em caso de insert
    $id = "";
    $nome = "";
    $img = "";
    $descricao = "";
    $categoria = "";
    $codigo_html = "";

    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'projeto_jogos');
    $extensoes_validas = array("jpg", "png", "jpeg", "webp");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <title>Cadastro de jogos</title>
</head>
<body>
<?php
        if (!empty($_REQUEST['action'])) {
            
            $completo = false;

            if ($_REQUEST['action'] == 'save') {
    
                $nome = filter_input(INPUT_POST, 'nome',
                            FILTER_SANITIZE_SPECIAL_CHARS);
                $descricao = filter_input(INPUT_POST, 'descricao',
                                 FILTER_DEFAULT);
                $categoria = filter_input(INPUT_POST, 'categoria',
                                 FILTER_SANITIZE_SPECIAL_CHARS);
                $codigo_html = $_REQUEST['codigo_html'];
                
                $nome_img = $_FILES['upload']['name'];
                $tamanho_img = $_FILES['upload']['size'];
                $pasta_temp = $_FILES['upload']['tmp_name'];
                $pasta_destino = "uploads/${nome_img}";

                // get file extension
                $ext = explode('.', $nome_img);
                $ext = strtolower(end($ext));
                //echo $ext;

                // verify image extension
                if (in_array($ext, $extensoes_validas)) {
                    // verify image size
                    if ($tamanho_img <= 1000000) {
                        move_uploaded_file($pasta_temp, $pasta_destino);
                        $completo = true;
                        //echo 'Imagem carregada com sucesso!';
                    } else
                        echo "<script>alert('Imagem muito grande!')</script>";
                } else
                    echo "<script>alert('Extensão de imagem inválida!')</script>";
                
                    // Insert
                if ($completo && empty($_POST['id'])) {
                    $query = "INSERT INTO jogos (nome, descricao, categoria, codigo_html, img)
                              VALUES ('{$nome}', '{$descricao}', '{$categoria}',
                                      '{$codigo_html}', '{$pasta_destino}')";

                    $result = mysqli_query($conn, $query);
                    if ($result)
                        echo 'Jogo cadastrado com sucesso!';
                    else
                        echo 'Erro ao inserir registro!';
                }
                // Update
                else {
                    $nome_img = $_FILES['upload']['name'];
                $tamanho_img = $_FILES['upload']['size'];
                $pasta_temp = $_FILES['upload']['tmp_name'];
                $pasta_destino = "uploads/${nome_img}";

                // get file extension
                $ext = explode('.', $nome_img);
                $ext = strtolower(end($ext));
                //echo $ext;

                // verify image extension
                if (in_array($ext, $extensoes_validas)) {
                    // verify image size
                    if ($tamanho_img <= 1000000) {
                        move_uploaded_file($pasta_temp, $pasta_destino);
                        $completo = true;
                        //echo 'Imagem carregada com sucesso!';
                    } else
                        echo "<script>alert('Imagem muito grande!')</script>";
                } else
                    echo "<script>alert('Extensão de imagem inválida!')</script>";

                    if($completo) {
                        
                        $query = "UPDATE jogos SET nome='{$nome}', img='{$pasta_destino}',
                                                   descricao='{$descricao}',
                                                   categoria='{$categoria}',
                                                   codigo_html='{$codigo_html}'
                                                   WHERE id={$_POST['id']}";
                        
                        $result = mysqli_query($conn, $query);
                        if ($result)
                            echo 'Jogo atualizado com sucesso!';
                        else
                            echo 'Erro ao atualizar registro';
                    }

                }
                    
            } else if ($_REQUEST['action'] == 'edit') {
                $query = "SELECT * FROM jogos WHERE id={$_GET['id']}";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $nome = $row['nome'];
                    $descricao = $row['descricao'];
                    $categoria = $row['categoria'];
                    $codigo_html = $row['codigo_html'];
                }
            }
        }
        
?>
    <?php if (isset($_SESSION['nome'])) { ?>
    <h3>Cadastro de jogos</h3> <a href="painel.php">voltar ao painel</a>
    <form enctype="multipart/form-data" method="POST" action="form_jogos.php?action=save">
    <label>Código</label>
        <input type="text" class="input" name="id" readonly="1" value="<?=$id?>">
        <label>Nome</label>
        <input type="text" class="input" name="nome" value="<?=$nome?>">
        <label>Imagem</label>
        <input type="file" class="input" name="upload">
        <label>Descrição</label>
        <textarea name="descricao" id="" cols="30" rows="10"><?=$descricao?></textarea>
        <label>Categoria</label>
        <input type="text" class="input" name="categoria" value="<?=$categoria?>">
        <label>Código html</label>
        <textarea name="codigo_html" id="" cols="30" rows="10" ><?=$codigo_html?></textarea>
        <input type="submit" name="btn" value="Salvar">
    </form>
    <?php } ?>
    <?php if(!isset($_SESSION['nome'])) header('Location: home.php'); ?>
</body>
</html>