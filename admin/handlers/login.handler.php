

<?php

    // est ce que baathli les données 
    // validation des données 
        // validation email
        // password 
    require("../../conn.php");
    
    if (!isset($_POST["email"]) || !isset($_POST["password"])){
        $msg = "error in email or password";
        header("location:../login.php?msg=".$msg);
        return;
    }
    if ($_POST["email"]=="" || $_POST["password"]==""){
        $msg = "  email or password are empty";

        header( "Location:../login.php?msg=".$msg );
        return;
    }

    try {   

        $data = [
            'email' => $_POST["email"],
            'password' =>$_POST["password"]
        ];
        $sql = "SELECT * from user WHERE email = :email AND password = :password";
        $stmt = $dbh->prepare($sql);


        $stmt->execute($data);

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // thabet ken au moin raj3et resulatt (count($res) == 0)
        // location 

        // ken rjaa result 
        // nthabet fel role 
        // ken role admin 
        // set the admin
        if(count($res)==0){
            $msg= "email or passwor are invalid ";
            header("location:../login.php?msg=".$msg);
            return;
        }
        echo $res[0]["role"];
        $user = $res[0];

        session_start();
        $_SESSION["role"]=$user["role"];
        $_SESSION["nom"]=$user["nom"];
        $_SESSION["prenom"]=$user["prenom"];

        header("location:../produits.php");
        
        
        session_start();

    }catch (Exception $e){
        echo $e;
    }
    

?>