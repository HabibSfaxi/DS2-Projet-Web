<?php
    echo "envoie des données";
    require("../conn.php");
    if (!isset($_POST["email"]) || !isset($_POST["password"])  || !isset($_POST["nom"]) || !isset($_POST["prenom"]) ||!isset($_POST["tel"]) || !isset($_POST["adresse"])   ){
        $msg = "error in required values";
        header("location:../inscription.php?msg=".$msg);
        return;
    }
    if ($_POST["email"]=="" || $_POST["password"]=="" || $_POST["nom"]=="" || $_POST["prenom"]=="" || $_POST["tel"]=="" || $_POST["adresse"]==""){
        $msg = "  values of form are empty";

        header( "Location:../inscription.php?msg=".$msg );
        return;
    }
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $tel=$_POST['tel'];
    $adresse=$_POST['adresse'];
   
    // nasnaa requete sql
    // to prevent sql injection 
    $data = [
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'password' => $password,
        'tel' => $tel,
        'adresse' => $adresse,
        'role' => "user",
    ];
        $sql = "INSERT INTO user (nom, prenom, email, password, tel, adresse, role) VALUES (:nom, :prenom, :email, :password, :tel, :adresse, :role)";
        $stmt= $dbh->prepare($sql);
        $stmt->execute($data);

        header("location:../login.php");
    

?>