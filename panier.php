<?php
    require("./conn.php");
    session_start();
    $id = $_GET["id"];
    if (!isset($_SESSION["panier"])){
        echo "panier vide";
        $_SESSION["panier"] = [$id=>1];  
    }else{
        $_SESSION["panier"][$id] += 1;
    }
    if ($_SESSION["id"]){
        
        $id_user=$_SESSION['id_user'];
        $qte = 1;
        $sql ="";
        if($_SESSION["panier"][$id]>1){
            $qte = $_SESSION["panier"][$id];
            $sql = "UPDATE panier SET qte = :qte WHERE id_produit = :id_produit AND id_user = :id_user";
        }else{
            $sql = "INSERT INTO panier (id_user, id_produit, qte) VALUES (:id_user, :id_produit, :qte)";
        }
        try {
            
            $data = [
                'id_user' => $_SESSION["id"],
                'id_produit' => $_GET["id"],
                'qte' => $qte,
            ];
          
            $stmt= $dbh->prepare($sql);
                $stmt->execute($data);
            header("location:./index.php");
        }catch(Exception $e){
            echo $e.getMessage();
        }
        try {
            $data = [
                'id_user' => $_SESSION["id"],
            ];
            $sql = "SELECT * FROM panier WHERE id_user = :id_user";
            $stmt = $dbh->prepare($sql);
            $stmt->execute($data);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($res as $prod){
                $_SESSION["panier"][$prod['id_produit']]=$prod['qte'];
            }
            header("location:./index.php");

        }catch(Exception $e){
            echo $e;
        }
    }
    header("location:./index.php");
?>