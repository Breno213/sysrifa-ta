<?php

    session_start();

    session_destroy();

        $dados = array(
            'tipo' => 'success',
            'mensagem' => ''
        );
    

    echo json_encode($dados);