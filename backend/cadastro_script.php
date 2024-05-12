<?php 

    include ("conexao.php");
    include("../frontend/cadastro.html");

    if(isset($_POST['nome'], $_POST['cpf'], $_POST['email'], $_POST['senha'])) {
        // Obter os valores dos campos do formulário
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
    
        // Escapar caracteres especiais nos valores
        $nome = mysqli_real_escape_string($conn, $nome);
        $cpf = mysqli_real_escape_string($conn, $cpf);
        $email = mysqli_real_escape_string($conn, $email);
        $senha = mysqli_real_escape_string($conn, $senha);
    
        // Consulta SQL para inserir dados
        $sql = "INSERT INTO `pessoas` (`nome`, `cpf`, `email`, `senha`) VALUES ('$nome', '$cpf', '$email', '$senha')";
    
        if(mysqli_query($conn, $sql)){
            echo "$nome cadastrado com sucesso!";
        } else{
            echo "$nome não foi cadastrado!";
        }
    }
    
?>
