<?php
    require("./components/header.php");
    require("./components/restriction.php");

?>
<?php
    if (isset($_GET['id'])){
        $id = $_GET['id'];
    $sql = "SELECT * from produits WHERE id = {$id}";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($res["id"]);
    if (!isset($res['id'])){
        header("location:./produits.php?msg='pas de produit avec cet id'");
    }
    }else{
        header("location:./produits.php?msg='error il faut mettre un id '");
    }
    
?>
<div class="d-flex flex-column ">
<h1> Modifier votre produit</h1>

<h2>ID produit : <?php echo $id;?></h2>


<form action="product.edit.php" method="post" class="d-flex flex-column">
    <label for="nom">nom</label>
    <input id="nom" type="text" name="nom" value="<?php echo $res['nom'];?>"/>

    <label for="prix">prix</label>
    <input id="prix" type="number" name="prix" value="<?php echo $res['prix'];?>"/>

    <label for="image">image</label>
    <input id="image" value="<?php echo $res['image'];?>" type="file" name="image"/>

    <label for="id_categorie">cateogrie</label>
    <input id="id_categorie" type="number" name="id_categorie" value="<?php echo $res['id_categorie'];?>" required/>
    
    <button type="submit">Modifier</button>
</form>
</div>
<?php
    require("../components/footer.php");
?>


