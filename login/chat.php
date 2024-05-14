<?php
require_once "config.php"; // Requer a conexão existente

// Classe Sintomas
class Sintomas {
    private $conn;

    // Construtor da classe
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Método para obter perguntas do banco de dados
    public function obterPerguntas() {
        $perguntas = [];

        // Consulta SQL para obter todas as perguntas
        $sql = "SELECT id, texto FROM perguntas";
        $result = $this->conn->query($sql);

        // Verifica se há resultados
        if ($result->num_rows > 0) {
            // Loop através dos resultados e armazenar as perguntas em um array
            while ($row = $result->fetch_assoc()) {
                $perguntas[$row['id']] = $row['texto'];
            }
        }

        // Retorna o array de perguntas
        return $perguntas;
    }

    // Método para verificar os sintomas com base no número selecionado pelo usuário
    public function verificarSintomas($sintomaSelecionado) {
         // Verifica se o sintoma selecionado é "Não escolher"
        if ($sintomaSelecionado == 6) {
        // Redireciona para o vídeo do YouTube
            header("Location: https://youtu.be/hPr-Yc92qaY?si=dbMNKx748uZ_zUbG");
            exit;
        }
        // Consulta SQL para obter a resposta correspondente ao sintoma selecionado
        $sql = "SELECT resposta FROM respostas WHERE id = ?";
        
        // Prepara a consulta
        $stmt = $this->conn->prepare($sql);
        
        // Vincula o parâmetro e executa a consulta
        $stmt->bind_param("i", $sintomaSelecionado);
        $stmt->execute();
        
        // Obtém o resultado da consulta
        $result = $stmt->get_result();
        
        // Verifica se há resultados
        if ($result->num_rows > 0) {
            // Retorna a resposta correspondente ao sintoma selecionado
            $row = $result->fetch_assoc();
            return $row['resposta'];
        } else {
            // Retorna uma mensagem de erro se não houver resposta para o sintoma selecionado
            return "Resposta não encontrada para o sintoma selecionado.";
        }
    }
}

// Função para obter entrada do usuário a partir do formulário
function getInput($name) {
    return isset($_POST[$name]) ? $_POST[$name] : '';
}

// Criação de uma instância da classe Sintomas, passando a conexão com o banco de dados como parâmetro
$sintomas = new Sintomas($conn);

// Se o formulário foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o número selecionado pelo usuário do campo de formulário
    $sintomaSelecionado = getInput("sintoma");
    // Chama o método verificarSintomas() para verificar os sintomas
    $resposta = $sintomas->verificarSintomas($sintomaSelecionado);
}
$query = "SELECT nome FROM paciente ORDER BY id DESC LIMIT 1"; // Altere '1' para o ID do paciente desejado
$result = $conn->query($query);

// Verifica se a consulta foi bem-sucedida e se há pelo menos uma linha de resultado
if ($result && $result->num_rows > 0) {
    // Obtém o nome do paciente da linha de resultado
    $row = $result->fetch_assoc();
    $nomePaciente = $row['nome'];
} else {
    // Define um valor padrão se o nome do paciente não puder ser recuperado
    $nomePaciente = "Paciente";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/stylechat.css">
    <title>Chat</title>
</head>
<body>
    <div class="base">
        <div class="center">
            <img src="components/Big_Logo_MedGPT.svg" alt="">
            <h2><?php echo "Quais Sintomas você está sentindo, $nomePaciente?"; ?></h2>
            <ul>
                <?php 
                // Obtém as perguntas do banco de dados
                $perguntas = $sintomas->obterPerguntas();
                
                // Loop através das perguntas e exibe cada uma delas
                foreach ($perguntas as $id => $pergunta) {
                    echo "<li>$id - $pergunta</li>";
                }
                ?>
            </ul>
            <p>
            <?php 
                // Verifica se $resposta está definida
                if (isset($resposta)) {
                    echo "Você está com: $resposta";
                } else {
                    echo "Nenhum sintoma selecionado.";
                }
                ?>
            </p>        
            <!-- Formulário para seleção de sintomas -->
            <form method="post">
                <label for="sintoma">Digite o número correspondente à sua escolha:</label>
                <input type="text" id="sintoma" name="sintoma">
                <button class="btn" type="submit">Enviar</button>
            </form>
            <button class="btn"><a href="site.php">Voltar</a></button>
    
            
        </div>
    </div>
</body>
</html>
