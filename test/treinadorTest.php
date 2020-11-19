<?php

    require_once "../model/treinador.php";
    require_once "../model/treinadorDao.php";
    require_once "../db/conexao.php";

    $conexao = new Conexao();
    $treinadorDao = new TreinadorDao($conexao);

    // Listar Todos os Treinadores
    echo "<h3>Listar todos os treinadores</h3>";

    $treinadores = $treinadorDao->listarTudo();
    echo "<pre>";
    print_r($treinadores);
    echo "</pre>";


?>