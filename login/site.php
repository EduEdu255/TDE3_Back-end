<?php
    session_start();
    require_once "config.php";

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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web site</title>
</head>
<body>
    <h1>Logado woooooooooooow!!!!! <h1>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="submit" name="logout" value="Logout">

    <?php
        if(isset($_POST["logout"])){
            logout();
        }
    ?>

</body>
</html>