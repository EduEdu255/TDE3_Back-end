<?php
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    
    require_once "config.php";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST['email'];
        $password = $_POST['password'];
    }
    
    $sql = "SELECT * FROM users WHERE email = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    if($result->num_rows === 1) {
        $row = $result->fetch_assoc();
    
        if (password_verify($password, $row['password'])) {
            $_SESSION["loggedin"] = true;
    
            header("Location: site.php");
            exit;
        }
    }
    else{
        $error = "Usuário ou senha incorreta";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="index.php">
        email: <input type="text" name="email" require><br>
        senha: <input type="password" name="password" require><br>

        <input type="submit" value="Logar">
    </form>

    <br>
    <a href="cadastrar.php">Ainda não é cadastrado</a>
</body>
</html>