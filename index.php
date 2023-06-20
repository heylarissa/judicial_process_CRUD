<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Teste de PHP</title>
    <style>
        body { background-color:lightsteelblue;
        }
        p { font-family: verdana;
            color: white;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <?php
    
    require "backend/config.ini.php";
    require "backend/db_connector.php";
    
    $connector = new dbConnector(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
    $connection = $connector->connect();
    
    // Cria o comando SQL adequado para o SELECT
    $sql = "SELECT * FROM processos";
    $result = $connection->query($sql); // Executa o comando SQL
    
    if ($result->num_rows > 0) {  // Verifica se são retornadas linhas
      // Exibe os dados de cada linha retornada
      while($row = $result->fetch_assoc()) {
        echo "id: " . $row["client_id"]. " - Nome: " . $row["numero_processo"]. " " . $row["proximo_prazo"]. "<br>";
      }
    } else {
      echo "Não foram retornados registros."; // Não há linhas (registros) retornados
    }
    
    $connection->close();
    

    // Imprime dados na tela.
    echo "<p>Olá mundo!</p>";
    // Também imprime dados na tela.
    print "<p>Olá de novo, mundo!</p>";
    ?>
</body>
</html>