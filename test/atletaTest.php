<?php

    require_once "../model/atleta.php";
    require_once "../dao/atletaDao.php";
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
    echo "<pre>";
    print_r($atleta);
    echo "</pre>";


    echo "<h3>Pesquisar atletas por Nome</h3>";
    $atletas = $atletaDao->pesquisarNome('ro');
    echo "<pre>";
    print_r($atletas);
    echo "</pre>";


    echo "<p><b>*Comentado os testes do metodo salvar</b></p>";
     // 3 - Salvar - inserir atleta
    // echo "<h3>Salvando novo atleta </h3>";
    // $atletaNovo = new Atleta('Novo Atleta', 28);
    // $atletaNovo->__set('salario', 77555.99);
    // $atletaNovo->__set('altura', 1.78);
    // $atletaNovo->__set('peso', 75.7);
    // $atletaDao->salvar($atletaNovo);
    
    // echo "<pre>";
    // print_r($atletaNovo);
    // echo "</pre>";


    // // 3 - Salvar - alterar atleta
    // echo "<h3>Alterando atleta </h3>";
    // $atletaUp = $atletaDao->pesquisarId(3);

    // echo "<h3>Atleta antes de alterar</h3>";
    // echo "<pre>";
    // print_r($atletaUp);
    // echo "</pre>";
    
    // // Define um novos valores para os atributos
    // $atletaUp->__set('nome', 'Teste Alterar');
    // $atletaUp->__set('idade', 26);
    // $atletaUp->__set('salario', 47651.50);
    // $atletaUp->__set('altura', 1.82);
    // $atletaUp->__set('peso', 90.5);


    // // Executa o método que fará a alteração dos dados do treinador no BD
    // $atletaDao->salvar($atletaUp);

    // // Pesquisa e impressão dos dados novamente, para exibir a alteração.
    // echo "<h3>Atleta apos alteracoes </h3>";
    // $atletaUp = $atletaDao->pesquisarId(3);
    // echo "<pre>";
    // print_r($atletaUp);
    // echo "</pre>";

?>