<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Cadastrar</title>
</head>
<body>
    <h1>cadastrar</h1>
    <form method="post" action="cadastro.php">

        Nome: <input type="text" name="name" required><br>

        E-mail: <input type="email" name="email" required><br>

        Senha: <input type="password" name="password" required><br>

        <input type="submit" value="Cadastrar">

    </form>
    <a href="index.php">Faça login</a>

</body>
</html>