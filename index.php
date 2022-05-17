<?php
    require("./conn.php");
    require("./components/header.php");
?>
    <h1 class="mt-5">Most popular Products </h1>
    <div id="carouselExampleControls" class="carousel slide mt-5" data-bs-ride="carousel">
        <div class="carousel-inner d-flex justify-content-center" style="margin-left:-20%;">
            <?php 
            $i = 0;
                 foreach($dbh->query('SELECT *
                 FROM panier
                 LEFT JOIN produits
                 ON panier.id_produit = produits.id;') as $row) {
                     $img = $row['image'];
                     $nom = $row['nom'];
                     $id = $row['id'];
                     $i++;
            ?>
                <div class="carousel-item <?php if ($i==1) echo "active";?>" >
                    <a href="detailproduit.php?id=<?= $id ?>"><img src="<?= $img ?>" class="d-block" style="width:30%;" alt="<?= $nom ?>" ></a>
                </div>
           <?php } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
        <hr>
        <div class="container mt-5" >
                <h1 style="text-decoration:underline">Nos categories </h1>
                <h2 class="mt-5"> Smartphones </h2>
                <div class="row d-flex justify-content-center gx-5" >
                    <?php 
                    $i = 0;
                        foreach($dbh->query('SELECT * from  produits where id_categorie = 2') as $row) {
                            $img = $row['image'];
                            $nom = $row['nom'];
                        $id = $row['id'];

                            $i++;
                    ?>
                            <div class='col-4 d-flex flex-column' style = >
                            <div style="box-shadow : 4px 8px 16px gray;box-sizing:border-box;margin:5px;padding:10px 20px;">
                            <a href="detailproduit.php?id=<?= $id ?>"><img src="<?= $img ?>" class="d-block" style="width:100%;" alt="<?= $nom ?>" ></a>
                                <h3> <?= $nom ?> </h3>
                            </div>
                    </div> 
                <?php } ?>
                </div>
        </div>
        <div class="container mt-5"> 
                <h2> Accessoires </h2>
                <div class="row d-flex justify-content-center gx-5" >
                    <?php 
                    $i = 0;
                        foreach($dbh->query('SELECT * from  produits where id_categorie = 1') as $row) {
                            $img = $row['image'];
                            $nom = $row['nom'];
                            $id = $row['id'];

                            $i++;
                    ?>
                            <div class='col-4 d-flex flex-column' style = >
                            <div style="box-shadow : 4px 8px 16px gray;box-sizing:border-box;margin:10px;">
                            <a href="detailproduit.php?id=<?= $id ?>"><img src="<?= $img ?>" class="d-block" style="width:100%;" alt="<?= $nom ?>" ></a>
                                <h3> <?= $nom ?> </h3>
                            </div>
                    </div> 
                <?php } ?>
                </div>
        </div>
        <div class="container mt-5">
            <h2> Protège </h2>
            <div class="row d-flex justify-content-center gx-5" >
                <?php 
                $i = 0;
                    foreach($dbh->query('SELECT * from  produits where id_categorie = 3') as $row) {
                        $img = $row['image'];
                        $nom = $row['nom'];
                        $id = $row['id'];

                        $i++;
                ?>
                        <div class='col-4 d-flex flex-column' style = >
                            <div style="box-shadow : 4px 8px 16px gray;box-sizing:border-box;margin:10px;">
                            <a href="detailproduit.php?id=<?= $id ?>"><img src="<?= $img ?>" class="d-block" style="width:100%;" alt="<?= $nom ?>" ></a>
                                <h3> <?= $nom ?> </h3>
                            </div>
                    </div> 
            <?php } ?>
            </div>
        </div>

<?php
    require("./components/footer.php");
?>
