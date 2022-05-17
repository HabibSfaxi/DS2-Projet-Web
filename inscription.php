<?php 
require("conn.php");
require ("./components/header.php");
?>
<h1>
    Formulaire d'inscription
</h1>
<div  style="width:100%; display:flex;justify-content:center;">
<form action="./handlers/inscription.handler.php" method="POST" style="display:flex; flex-direction:column;  width:20%;">
<input type="text" name="nom" placeholder="Nom">
<input type="text" name="prenom" placeholder="Prenom">
<input type="text" name="email" placeholder="E-mail">
    <input type="password" name="password" placeholder="Mot de passe">
    <input type="text" name="tel" placeholder="Numero Telephone">
    <input type="text" name="adresse" placeholder="Adresse">
    <button type="submit">s'inscrire</button>
</form>

</div>
<?php 
require ("./components/footer.php");
?>