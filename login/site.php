<?php
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    require_once "config.php";

    // Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos obrigatórios não estão vazios
    if (!empty($_POST["nome"]) && !empty($_POST["cpf"]) && !empty($_POST["data"])) {
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
            echo "Erro: " . $sql . "<br>" . $stmt->error;
        }

        // Fecha o statement
        $stmt->close();
    } else {
        // Exibe uma mensagem de erro se algum campo obrigatório estiver vazio
        echo "Todos os campos são obrigatórios.";
    }
}
 
    //LOGOUT = DESCONECTAR DA PAGINA
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/stylesite.css">
    <title>Web site</title>
</head>
<body>
    <div class="center">
        <img src="components/Big_Logo_MedGPT.svg" alt="">
        <h1>Bem vindo!</h1>
    
        
        <h2>Dados do paciente:</h2>
        <form class="pct" method="POST" action="site.php">
            <label class="inf">Nome do paciente</label>
            <input type="text" name="nome" placeholder="Digite o nome do paciente" required>
            
            <label for="" class="inf">CPF do paciente</label>
            <input type="text" name="cpf" placeholder="Digite o CPF do paciente" required>
            
            <label for="" class="inf">Data nascimento do paciente</label>
            <input type="date" name="data" placeholder="Digite a data de nascimento" required>
            
            <input class="sbt" type="submit" value="enviar">
        </form>
        <form class="quit" method="POST" action="site.php">
            <input type="submit" name="logout" value="Logout">
        </form>
    </div>
</body>
</html> 