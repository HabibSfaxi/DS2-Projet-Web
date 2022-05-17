<?php
    session_start();
    $_SESSION["role"]="";
    $_SESSION["nom"]="";
    $_SESSION["prenom"]="";
    $_SESSION["id"] = "";
    $_SESSION["panier"] = [];
    session_destroy();
    header("location:../login.php");

?>