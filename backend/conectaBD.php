<?php

$endereco = "localhost";
$banco = "hospital";
$user = "root";
$password = "";
$port = "3306";

try {
    $pdo = new PDO("pgsql:host=$endereco;port=$port;dbname=$banco", $usuario, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    echo "Conectado ao banco de dados!!!";
} catch (PDOException $e) {
    echo "Falaha ao conectar ao banco de dados. <br>";
    die($e->getMessage());
}

?>
