<?php
// if (session_status() != PHP_SESSION_ACTIVE) {
//     session_start();
// }
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (nome, email, password) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql); // corrected variable name from $sql to $stmt
    $stmt->bind_param("sss", $name, $email, $hashed_password);
    
    if($stmt->execute()){ // corrected variable name from stmt to $stmt
        echo "Usuário criado com sucesso";
    } else{
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}
$conn->close();

include "cadastrar.html";
?>