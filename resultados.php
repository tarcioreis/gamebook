<?php
    require_once 'inc/header.php';
    
    if(!empty($_POST['game']) && !empty($_POST['pesquisar'])) {
        
        $game = ucwords($_POST['game']);
        
        $conn = mysqli_connect('localhost', 'root', '', 'projeto_jogos');
        $select = "SELECT id, nome, SUBSTRING(`descricao`, 1, 65) as resumo, categoria, img
                   FROM jogos WHERE nome='{$game}'";

        $result = mysqli_query($conn, $select);
        $row_count = mysqli_num_rows($result);
    }
?>

<main>
        <?php
            while ($row = mysqli_fetch_assoc($result)) {
                
        ?>
        <div class="card">
            <div class="image">
                <img src="<?=$row['img']?>" alt="">
            </div>
            <div class="caption">
                <a href="game.php?j=<?=$row['id']?>"><p class="nome_jogo"><?=$row['nome']?></p></a>
                <p class="text">
                    <?=$row['resumo']?>
                </p>
                <p class="categoria"><?=$row['categoria']?></p>
            </div>
        </div>
        <?php
            }
        ?>
    </main>

    <?php if($row_count == 0) { ?>
        <div class="display_erro">
            <img src="img/zero_pesquisa.png" alt="Nenhum resultado!">
        </div>
    <?php } ?>
