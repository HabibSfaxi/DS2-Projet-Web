<?php 
    if (!isset($_SESSION["nom"])){
        echo "";
    }else{
        echo  "<span style='display:flex;flex-direction:column; border:1px solid wheat'>  
                <span style='color:blue'>".$_SESSION["nom"]." ".$_SESSION["prenom"]."</span> </span>";
        echo  '<a href="./handlers/logout.handler.php"><button class="btn btn-alert" type="button">logout</button></a>';
    } 
?>