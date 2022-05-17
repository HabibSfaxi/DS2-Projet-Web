<?php
    require("./conn.php");
    require("./components/header.php");
    // requetre recherche 
    if (isset($_GET['search']) || isset($_GET['categorie'])){
        $search = $_GET['search'];
        $categorie = $_GET['categorie'];
        if (!$search=="" && !$categorie=="" ){
            $sql = "SELECT * FROM produits WHERE nom LIKE '%$search%' AND categorie = '$categorie'";
        }else if (!$search=="" && $categorie=="" ){
            $sql = "SELECT * FROM produits WHERE nom LIKE '%$search%'";
        }else if ($search=="" && !$categorie=="" ){
            $sql = "SELECT * FROM produits WHERE categorie = '$categorie'";
        }
        $result = $dbh->query($sql);
        $result = $result->fetchAll();
    }
   
?>
<h1>Recherche</h1>
<?php
    if (count($result)==0){
        echo "<h3>Produit Introuvable !</h3>";
    }else{
        foreach($result as $prod ){
            echo '<li style="display:flex;justify-content:space-between;width=300px">
                      <a class="dropdown-item" href="#" width="150px">'.$prod['nom'].'</a>
                      <img src="'.$prod['image'].'" width="80px"/>';
        }
    }
   

    ?>
                  
              
<?php 

    require("./components/footer.php");
    ?>