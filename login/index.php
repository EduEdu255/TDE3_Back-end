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
    include "login.html";
    ?>