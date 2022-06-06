<?php

  $hostname = "sql107.epizy.com";
  $database = "epiz_31892403_sysrifa";
  $user = "epiz_31892403";
  $password = "aNvxTmYwtMs";

  try{
    $pdo = new PDO("mysql:host=" .$hostname.";dbname="$database .$user .$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexão com o Banco de Dados ".$database.", foi bem sucedida!";
  } catch (PDOException $e) {
    echo "Erro." .$e->getMessage();

  }