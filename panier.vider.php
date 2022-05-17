<?php
    require("./conn.php");
    echo "he";
    session_start();
    
    $_SESSION["panier"] = array();
    if (isset($_SESSION["id"])){
        try{
            $data = [
                'id_user'=>$_SESSION["id"]
            ];
            $sql = "DELETE from panier WHERE id_user = :id_user ";
            $stmt = $dbh->prepare($sql);
            $stmt->execute($data);
        }catch(Exception $e){
            echo $e;
        }
       
    }
    header("location: index.php");
    
?>