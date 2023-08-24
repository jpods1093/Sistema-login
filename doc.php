<?php

session_start();

if (!isset($_SESSION['id_usuario'])) :

    header("location: index.php");
    exit;

endif;


?>

<!DOCTYPE html>
<html lang="PT-br">
<head>
  <title>Documentação de Softwares</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
    }
    .container {
      display: inline-block;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
    }
    .button {
      display: block;
      margin: 10px 0;
      padding: 20px 40px;
      background-color: #007BFF;
      color: white;
      text-decoration: none;
      border: none;
      border-radius: 4px;
      font-size: 18px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h1>Documentação de Softwares</h1>
  <div class="container">
  <a href="https://orginstitutobrasil-my.sharepoint.com/:w:/g/personal/joao_pedro_orginstitutobrasil_onmicrosoft_com/ES92k2_Bry9PkbuwQW5_gAIBk-0eWMAKRmic5AQ0jYmm8w?e=3zdKsv" target="_blank" class="button">Convertice</a>
  <a href="" target="_blank" class="button">Relatorio tecnico processos</a>
  <a href="" target="_blank" class="button">Relatorio de atividades</a>
  <a href="" target="_blank" class="button">Estatisticas GLPI</a>
  </div>
  <br><br>
  <div class="container">
  <a href="areaPrivada.php" class="button">Página Inicial</a>
  <a href="sair.php" class="button">Sair</a>
  </div>
</body>
</html>
