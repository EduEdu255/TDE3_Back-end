<?php
    // if (session_status() != PHP_SESSION_ACTIVE) {
    //     session_start();
    // }
    require_once "config.php";

    // Verifica se a requisição é do tipo POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera os dados do formulário
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $data = $_POST["data"];

        // Prepara a instrução SQL para inserir os dados na tabela 'paciente'
        $sql = "INSERT INTO paciente (nome, cpf, data_nasc) VALUES (?, ?, ?)";

        // Prepara o statement
        $stmt = $conn->prepare($sql);

        // Faz o bind dos parâmetros
        $stmt->bind_param("sss", $nome, $cpf, $data);

        // Executa a instrução SQL
        if($stmt->execute()) {
            // Redireciona para a próxima página
            header("Location: chat.php");
            exit;
        } else {
            // Em caso de erro, exibe uma mensagem de erro
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }

        // Fecha o statement
        $stmt->close();
    }
    
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
    

 