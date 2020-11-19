<?php

    require_once "../model/atleta.php";
    require_once "../model/atletaDao.php";
    require_once "../db/conexao.php";

    $conexao = new Conexao();
    $atletaDao = new AtletaDao($conexao);

    echo "Lista de atletas";

    $atletas = $atletaDao->listarTudo();
    echo "<pre>";
    print_r($atletas);
    echo "</pre>";

?>