<?php
    
    require("./components/header.php");
    require("./components/restriction.php");

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    echo $_SESSION["role"];
?>
<div class="d-flex flex-column ">
<h1> Créer un nouveau produit</h1>
<form action="product.create.php" method="post" class="d-flex flex-column">
    <label for="nom">nom</label>
    <input id="nom" type="text" name="nom"/>

    <label for="prix">prix</label>
    <input id="prix" type="number" name="prix"/>

    <label for="image">image</label>
    <input id="image" type="text" name="image"/>

    <label for="id_categorie">categorie</label>
    <input id="id_categorie" type="number" name="id_categorie" />
    
    <button type="submit">Créer</button>
</form>
</div>
<?php
    require("../components/footer.php");
?>

