<?php
    //Banco de dados
    session_start();
    //é um usuario meu no Mysqladmin
    //agente vai trocar por um localgost aberto depois
    $servername = "localhost";
    $username = "julio";
    $password = "123456";
    $dbname = "login";

    $conn = new mysqli($servername, $username, $password, $dbname);

    //verifica conexão
    if($conn->connect_error) {
        die("Falha na conexão" .$conn->connect_error);
    }

?>