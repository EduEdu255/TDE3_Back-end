<?php
    session_start();
    require_once "config.php";

       //teste
    //    $sql = "SELECT nome FROM users WHERE id = 1"; // Supondo que o nome está na tabela usuarios e você deseja o nome do usuário com ID 1

    //    $resultado = $conn->query($sql);
       
    //    if ($resultado->num_rows > 0) {
    //        // Obtém o resultado da consulta
    //        $row = $resultado->fetch_assoc();
    //        $nome = $row["nome"];
       
    //        // Retorna o nome como resposta
    //        echo $nome;
    //    } else {
    //        echo "Nome não encontrado";
    //    }
       
    //    // Fecha a conexão com o banco de dados
    //    $conn->close();
   
       //teste acaba aqui

    function logout(){
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit;
    }

    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
        header("location: index.php");
        exit;
    }
    
    if(isset($_POST["logout"])){
        logout();
    }
    include "site.html"; 
    
 