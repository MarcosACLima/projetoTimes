<?php

    require_once "../model/time.php";
    require_once "../model/timeDao.php";
    require_once "../db/conexao.php";
    require_once "../model/atletaDao.php";
    require_once "../model/treinadorDao.php";

    $conexao = new Conexao();
    $timeDao = new TimeDao($conexao);

    echo "<h3>Lista com todos os Times</h3>";
    $times = $timeDao->listarTudo();
    echo "<pre>";
    print_r($times);
    echo "</pre>";

    echo "<h3>Pesquisar time por Id</h3>";
    $time = $timeDao->pesquisarId(1);
    echo "<pre>";
    print_r($time);
    echo "</pre>";

    echo "<h3>Pesquisar time por Nome</h3>";
    $time = $timeDao->pesquisarNome('Real Dev');
    echo "<pre>";
    print_r($time);
    echo "</pre>";

?>