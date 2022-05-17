<?php
    require("../conn.php");
    $nom=$_POST['nom'];
    $prix=$_POST['prix'];
    $image=$_POST['image'];
    $id_categorie=$_POST['id_categorie'];
    // je dois créer un nouveau produit
   
    // nasnaa requete sql
    // to prevent sql injection 
    $data = [
        'nom' => $nom,
        'prix' => $prix,
        'image' => $image,
        'id_categorie' => $id_categorie,
    ];
    try {
        $sql = "INSERT INTO produits (nom, prix, image, id_categorie) VALUES (:nom, :prix, :image, :id_categorie)";
        $stmt= $dbh->prepare($sql);
        $stmt->execute($data);

        header("location:./produits.php");
    }catch(Exception $e){
        echo $e;
    }
    
?>