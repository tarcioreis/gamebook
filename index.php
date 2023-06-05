<?php require_once 'inc/header.php'; ?>    

    <?php
        $conn = mysqli_connect('localhost', 'root', '', 'projeto_jogos');
        $query = "SELECT id, nome, SUBSTRING(`descricao`, 1, 65) as resumo, categoria, img
                  FROM jogos";
        $result = mysqli_query($conn, $query);
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
                <a id="link" href="game.php?j=<?=$row['id']?>"><p class="nome_jogo"><?=$row['nome']?></p></a>
                <!--<p class="text">
                    <?=$row['resumo']?>
                </p>-->
                <p class="categoria"><?=$row['categoria']?></p>
            </div>
        </div>
        <?php
            }
        ?>
    </main>

<?php require_once 'inc/footer.php'; ?>