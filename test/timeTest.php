<?php

    require_once "../model/time.php";
    require_once "../dao/timeDao.php";
    require_once "../db/conexao.php";
    require_once "../dao/atletaDao.php";
    require_once "../dao/treinadorDao.php";

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


    // iniciando teste de Salvar
    // echo "<h3>Testando Salvar</h3>";

    // $atletaDao = new AtletaDao($conexao);
    // $treinadorDao =  new TreinadorDao($conexao);

    // $atletas =  array();

    // $atletas[] = $atletaDao->pesquisarId(7);
    // $atletas[] = $atletaDao->pesquisarId(8);

    // $treinador = $treinadorDao->pesquisarId(4);


    // $timeSalvar =  new Time('Ajax', 'Campinas', $treinador, $atletas);
    // $timeSalvar->__set('qntVitoria', 25);
    // $timeSalvar->__set('anoFundacao', 1910);


    // echo "<pre>";
    // print_r($timeDao->salvar($timeSalvar));
    // echo "</pre>";
            

    // // Salvar - Teste alterar
    // echo "<h3>Time antes de alterar</h3>";
    // $timeUp = $timeDao->pesquisarId(4);
    // echo "<pre>";
    // print_r($timeUp);
    // echo "</pre>";
    
    // // // Define um novos valores para os atributos
    // $timeUp->__set('nome', 'Time UPUP');
    // $timeUp->__set('cidade', 'Itapaci');
    // $timeUp->__set('qntVitoria', 25);
    // $timeUp->__set('anoFundacao', 1969);


    // // Executa o método que fará a alteração dos dados do time no BD
    // $timeDao->salvar($timeUp);

    // // Pesquisa e impressão dos dados novamente, para exibir a alteração.
    // echo "<h3>Time apos alteracoes </h3>";
    // $timeUp = $timeDao->pesquisarId(4);
    // echo "<pre>";
    // print_r($timeUp);
    // echo "</pre>"; 

?>