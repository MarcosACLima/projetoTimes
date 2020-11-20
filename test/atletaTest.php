<?php

    require_once "../model/atleta.php";
    require_once "../model/atletaDao.php";
    require_once "../db/conexao.php";

    $conexao = new Conexao();
    $atletaDao = new AtletaDao($conexao);

    echo "<h3>Lista com todos de atletas</h3>";
    $atletas = $atletaDao->listarTudo();
    echo "<pre>";
    print_r($atletas);
    echo "</pre>";

    echo "<h3>Pesquisar atleta por Id</h3>";
    $atleta = $atletaDao->pesquisarId(2);
    print_r($atleta);

?>