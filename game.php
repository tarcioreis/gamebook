<?php
    require_once 'inc/header.php';
?>

<?php
    if(!empty($_REQUEST['j'])) {
        $id = $_REQUEST['j'];
        $conn = mysqli_connect('localhost', 'root', '', 'projeto_jogos');
        $query = "SELECT nome, descricao, codigo_html FROM jogos WHERE id=$id";
        $result = mysqli_query($conn, $query);
    }
?>
<div class="container">
    <div class="detalhes">
        <?php
            if($result) {
                $row = mysqli_fetch_assoc($result);
        ?>
        <h1><?=$row['nome']?></h1>
        <h3>Descrição</h3>
        <p><?=$row['descricao']?></p>

    </div>
    <div class="game_board">
        <?=$row['codigo_html']?>
    </div>
    <?php
        }
    ?>
</div>

<?php require_once 'inc/footer.php'; ?>