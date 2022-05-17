<?php 
require("./conn.php");
require("./components/header.php");
    if(!isset($_GET["id"])){
        echo "meme pas 7atit id";
    }
    $id = $_GET["id"];
    $data = [
        'id'=>$id,
    ];

    $sql = "SELECT * FROM produits WHERE id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if(count($res)==0){
        echo "pas de produit avec cet id ";
    }
    else{
        $produit = $res[0];
        $id = $produit["id"];
    }
    
?>
<div class="produit">
    <div class="img">
        <img src="<?= $produit['image'] ?>">
    </div>
    <div class="detail" >
        <h3> <?= $produit["nom"] ?> </h3>
        <div class="ajouter">
            <span> <?= $produit['prix'] ?> dt </span>
            <a href="panier.php?id=<?= $id ?>"><button>ajouter au panier</button></a> 
        </div>
    </div>
</div>
<style>
    .produit{
        display:flex;
        
    }
    .img img{
        width:100%;
    }
    .detail,.img{
        width:50%;
        padding:50px;
        box-sizing:border-box;
    }
    .detail {
        height:100%;
        display:flex;
        flex-direction:column;
        flex-gap:5;
       
    }
    .detail h3{
        font-size:4em;
        margin-top:100px;
        margin-bottom:50px;
    }
    .detail span{
        font-size:3rem;
        margin-bottom:50px;
    }
    .detail button{
        font-size:1.5rem;
        background:rgb(0,220,0);
        padding:15px 25px;
        color:white;
        font-weight:bold;
        margin-top:-6px;
    }
    .detail button:hover{
        background:rgb(0,180,0);;
        color:white;
    }
    .ajouter{
        display:flex;
        justify-content:center;
        align-items:center;
        
    }
    .ajouter span{
        font-size:3rem;
        margin-right:20px;
        margin-bottom:0;
        color:gray;
    }
</style>


<?php
require("./components/footer.php");
?>