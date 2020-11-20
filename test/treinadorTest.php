<?php

    require_once "../model/treinador.php";
    require_once "../model/treinadorDao.php";
    require_once "../db/conexao.php";

    $conexao = new Conexao();
    $treinadorDao = new TreinadorDao($conexao);

    echo "<h3>Lista com todos os treinadores</h3>";
    $treinadores = $treinadorDao->listarTudo();
    echo "<pre>";
    print_r($treinadores);
    echo "</pre>";


    echo "<h3>Pesquisar treinador por Id</h3>";
    $treinador = $treinadorDao->pesquisarId(2);
    print_r($treinador);


    
    
?>