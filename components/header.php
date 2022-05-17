<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phonestore - Home</title>
    <!-- Bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- custom css-->
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <style>
      *{
        font-family: 'Open sans', sans-serif!important;
      } 
</style>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="" style="width:200px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
    Nos catégories
  </button>
  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
    <?php 
      try{
        $sql = "SELECT * FROM categorie";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($res as $cat ){
          echo   '<li><a class="dropdown-item" href="#">'.$cat["titre"].'</a></li>';
        }
      }catch(Exception $e){
        echo $e->getMessage();
      }
     
    ?>
  

  </ul>
</div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="mx-5" style="position:relative;overflow:visible;">
        <form class="d-flex" role="search" action="recherche.php" method="GET"  >
          <input autocomplete="off" class="form-control me-5 " name="search" style="width:400px;" type="search" placeholder="nom produit, .." aria-label="Search" id="search">
          <button class="btn btn-outline-success" type="submit">Search</button>
         
      </form>
      <div id="produits" style="position:absolute;left:0;bottom:-100;width:400px;z-index:2;background:white;">
          </div>

      </li>
        
      <?php  
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }      
        if ( !isset($_SESSION["nom"]))  {
          echo 
          '<li class="nav-item">
            <a class="nav-link" href="inscription.php">Inscription</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">login</a>
          </li>';
        }
        ?>
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Panier
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php 
              
              if(!isset($_SESSION)) 
              { 
                  session_start(); 
              }              if (!isset($_SESSION["panier"])){
                echo "<li<a class='dropdown-item' href='#'>panier vide</a></li>";
              }else{
                
                $ids = join("','",array_keys($_SESSION["panier"]));
                $sql = "SELECT * FROM produits WHERE id IN ('$ids')";
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($res as $prod ){
                  echo '<li style="display:flex;justify-content:space-between;width=300px">
                            <a class="dropdown-item" href="detailproduit.php?id='.$prod['id'].'" width="150px">'.$prod['nom'].'</a>
                            <img src="'.$prod['image'].'" width="80px"/> 
                            qte : '.$_SESSION["panier"][$prod['id']].'
                        </li>';
                }
              }
              echo "<li><a class='dropdown-item' href='panier.vider.php'>vider le panier</a></li>";
            ?>
          </ul>
        </li>
     
      </ul>
      
      
      
            <?php require("./components/profile.php"); ?>
       
    </div>
  </div>
  <script>
    let searchInput = document.querySelector("#search");
    let productView = document.querySelector("#produits");

    searchInput.addEventListener("keypress",function(){
      let searchValue = searchInput.value;
      console.log(searchValue)
      fetch("http://localhost/phonestore/handlers/search.handler.php?search="+searchValue)
      .then(res=>res.json())
      .then(data=>{
        productView.innerHTML = ""
          data.forEach(produit=>{
            productView.innerHTML += `<li style="display:flex;justify-content:space-between;width=300px">
                                          <a class="dropdown-item" href="detailproduit.php?id=${produit.id} width="150px">${produit.nom}</a>
                                          <img src="${produit.image}" width="80px"/>
                                      </li>`
          })
      })
    })
  </script>
</nav>


<div class="conainter text-center d-flex justify-content-center flex-column ">
