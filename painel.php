<?php
    require_once 'inc/header.php';
    
    if(isset($_SESSION['nome'])) require_once 'controle.php';

    if(!isset($_SESSION['nome'])) header('Location: home.php');

    require_once 'inc/footer.php';
?>