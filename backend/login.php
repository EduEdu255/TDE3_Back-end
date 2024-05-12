<?php

$dados = $_POST;

header("Location:devolver.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>email</div>
    <p><?php
        echo $dados["email"];
        
    ?>    
    </p>
    <div>senha</div>
    <p>
        <?php
           echo $dados["senha"];
        ?>
    </p>
    
</body>
</html>