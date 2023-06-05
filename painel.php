<?php
    require_once 'inc/header.php';
    
    if(!isset($_SESSION['nome'])) header('Location: home.php');
    
    if(isset($_SESSION['nome'])) require_once 'controle.php';


    require_once 'inc/footer.php';
?>