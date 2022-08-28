<?php

   // obter a conexão com o banco de dados
   include('../../conexao/conn.php');

   // obter os dados enviados do formulário via $_REQUEST
   $requestData = $_REQUEST;

   // verificação de campos obrigatórios
   if(empty($requestData['TITULO']) || empty($requestData['DESCRICAO'])){
       // caso a variável venha vazia do formulário, devolver/retornar um erro
       $dados = array(
           "tipo" => 'error',
           "mensagem" => 'Existe campos obrigatórios não preenchidos.'
       );
   } else {
       // caso os campos obrigatórios estejam preenchidos, iremos realizar o cadastro
       $ID = isset($requestData['ID']) ? $requestData['ID'] : '';
       $operacao = isset($requestData['operacao']) ? $requestData['operacao'] : '';


       // verificação para cadastro ou avaliação de registro
       if($operacao == 'insert') {
           // comandos para o INSERT no banco de dados ocorrerem
           try{
               $stmt = $pdo->prepare('INSERT INTO PROMOCAO (TITULO, DESCRICAO) VALUES (:a, :b)');
               $stmt->execute(array(
                   ':a' => utf8_decode($requestData['TITULO']),
                   ':b' => utf8_decode($requestData['DESCRICAO'])
               ));
               $dados = array(
                "tipo" => 'success',
                "mensagem" => 'Registro salvo com sucesso'
            );
           } catch(PDOException $e) {
            $dados = array(
                "tipo" => 'error',
                "mensagem" => 'Não foi possível salvar o registro: '.$e
            );
           }
       } else {
           // se a operação vir vazia, então iremos realizar um UPDATE
           try{
            $stmt = $pdo->prepare('UPDATE PROMOCAO SET TITULO = :a WHERE ID = :id, DESCRICAO = :b WHERE ID = :id');
            $stmt->execute(array(
                ':id' => $ID,
                ':a' => utf8_decode($requestData['TITULO']),
                ':b' => utf8_decode($requestData['DESCRICAO'])
            ));
            $dados = array(
             "tipo" => 'success',
             "mensagem" => 'Registro atualizado com sucesso'
         );
        } catch(PDOException $e) {
         $dados = array(
             "tipo" => 'error',
             "mensagem" => 'Não foi possível atualizar o registro: '.$e
         );
       }
   }
}


   // converter o array de retorno em uma representação JSON
   echo json_encode($dados);