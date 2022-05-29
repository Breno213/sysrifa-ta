<?php

  $hostname = "sql102.epizy.com";
  $database = "epiz_31473897_sysrifa";
  $user = "epiz_31473897";
  $password = "9sghFBiKiA2";

  try{
    $pdo = new PDO("mysql:host=" .$hostname.";dbname="$database .$user .$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexão com o Banco de Dados ".$database.", foi bem sucedida!";
  } catch (PDOException $e) {
    echo "Erro." .$e->getMessage();

  }