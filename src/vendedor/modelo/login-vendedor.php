<?php

    include('../../conexao/conn.php');

    $sql = $pdo->query("SELECT *, COUNT(ID) as ACHOU FROM VENDEDOR WHERE LOGIN = '".$_REQUEST['LOGIN']."' AND SENHA = '".md5($_REQUEST['SENHA'])."'");

    while($resultado = $sql->fetch(PDO::FETCH_ASSOC)){
        // Testar para saber se eu encontrei o usuário
        if($resultado['ACHOU'] == '1'){
            // Criar uma sessão de navegador
            session_start();
            $_SESSION['ID'] = $resultado['ID'];
            $_SESSION['NOME'] = $resultado['NOME'];
            $dados = array(
                'tipo' => 'success',
                'mensagem' => 'Login correto'
            );
        }else{
            $dados = array(
                'tipo' => 'error',
                'mensagem' => 'Nome de usuário e/ou senha não encontrado.'
            );
        }
    }

    echo json_encode($dados);