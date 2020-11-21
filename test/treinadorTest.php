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

    echo "<h3>Pesquisar treinador por Nome</h3>";
    $treinador = $treinadorDao->pesquisarNome('Felipe');
    print_r($treinador);

     // 3 - Salvar - inserir treinador
    // echo "<h3>Salvando novo treinador </h3>";
    // $treinadorNovo = new Treinador('Novo Treinador', 12500);
    // $treinadorNovo->__set('qntVitoria', 14);
    // $treinadorNovo->__set('bonusSalario', 1500);
    // $treinadorDao->salvar($treinadorNovo);
    
    // echo "<pre>";
    // print_r($treinadorNovo);
    // echo "</pre>";


    // // 3 - Salvar - alterar treinador
    // echo "<h3>Alterando treinador </h3>";
    // $treinadorUp = $treinadorDao->pesquisarId(3);

    // echo "<h3>Treinador antes de alterar </h3>";
    // echo "<pre>";
    // print_r($treinadorUp);
    // echo "</pre>";
    
    // // Define um novos valores para os atributos
    // $treinadorUp->__set('nome', 'Teste Alterar');
    // $treinadorUp->__set('salario', 4000.50);
    // $treinadorUp->__set('qntVitoria', 17);
    // $treinadorUp->__set('bonusSalario', 1300.50);


    // // Executa o método que fará a alteração dos dados do treinador no BD
    // $treinadorDao->salvar($treinadorUp);

    // // Pesquisa e impressão dos dados novamente, para exibir a alteração.
    // echo "<h3>Treinador apos alteracoes </h3>";
    // $treinadorUp = $treinadorDao->pesquisarId(3);
    // echo "<pre>";
    // print_r($treinadorUp);
    // echo "</pre>";
        
?>