<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    echo "Email: ". $email . "<br>";
    echo "Senha: ". $senha;
 }