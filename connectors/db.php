<?php
require "config.ini.php";
require "db_connector.php";

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

$connection->close()
?>