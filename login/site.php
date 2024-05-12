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
    
    if(isset($_POST["logout"])){
        logout();
    }
    include "site.html"; ?>