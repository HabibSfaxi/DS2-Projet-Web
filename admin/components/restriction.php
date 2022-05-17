<?php if(!isset($_SESSION["role"])){
        header("location:./login.php");
    }
    if($_SESSION["role"]!="admin"){
        header("location:./login.php");
    }
?>