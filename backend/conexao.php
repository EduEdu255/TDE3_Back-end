<?php
$hostname = "localhost";
$bancodedados = "hospital";
$usuario = "root";
$senha = "";

// Conectando ao banco de dados MySQL usando a extensão MySQLi
$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);

// Verificando se houve algum erro na conexão
if ($mysqli->connect_errno) {
    echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} else {
    echo "Conectado ao Banco de Dados";
}
?>