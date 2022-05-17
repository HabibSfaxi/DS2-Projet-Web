<?php
    require("../conn.php");

    $id = $_GET["id"];
    echo $id;
    // executer requete delete 
    $data = [
        'id' => $id,
    ];
   
        $sql = "DELETE from produits WHERE id = :id ";
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);
    
    // redirger vers la page produits  
    header("location:./produits.php?msg='produit a ete supprimer avec succes'");
?>