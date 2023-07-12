<?php
  
  date_default_timezone_set('America/Sao_Paulo');

  try{
    $pdo = new PDO('mysql:host=localhost;dbname=agenda', "root","");
  }
  catch(PDOException $erro)
  {
    echo("ERRO NA CONEXÃO: <br>".$erro->getMessage());
  }
?>  