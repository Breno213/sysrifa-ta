<?php

    session_start();

    if(!isset($_SESSION['ID'])){
        $dados = array(
            'tipo' => 'error',
            'mensagem' => 'Você não está autenticado no sistema, faça o login.'
        );
    }else{
        $dados = array(
            'tipo' => 'success',
            'mensagem' => 'Seja bem vindo, '.$_SESSION['NOME']
        );
    }

    echo json_encode($dados);