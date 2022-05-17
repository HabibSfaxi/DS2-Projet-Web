<?php
  require("./conn.php");
  require("./components/header.php");
 
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- custom css-->
    <link href="../css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <!-- navbar -->
   <div class="conainter text-center d-flex justify-content-center flex-column align-center  " style="height:80vh">

<h1>Se connecter</h1>
<div  style="width:100%; display:flex;justify-content:center;">
<form action="./handlers/login.handler.php" method="POST" style="display:flex; flex-direction:column;  width:20%;">
    <input type="text" name="email" placeholder="E-mail">
    <input type="password" name="password" placeholder="Mot de Passe">
    <button type="submit">login</button>
</form>

</div>
<?php
    require("./components/footer.php");
?>
