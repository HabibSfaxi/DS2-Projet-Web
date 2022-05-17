<?php
    require("./components/header.php");
    require("./components/restriction.php");
?>
<?php if (isset($_GET["msg"])){
        echo "
        <div id='alert' style='position:absolute;top:0;'class='alert alert-danger' role='alert'>
        ".$_GET["msg"]."</div>
        <script>
        setTimeout(function(){
            document.querySelector('#alert').style.display = 'none';
        },3000);
        </script>
      ";
    }
    ?>

<?php
    function showProduit($res){
        echo "<table border=1><thead>
                    <tr>
                    <th>id_produit</th>
                    <th>nom produit</th>
                    <th>prix</th>
                    <th>image</th>
                    <th>categorie</th>
                    <th>Action</th>
                    </tr>
                    </thead>";
   
        foreach ($res as $row){
            echo "<tr>";
            foreach($row as $key=>$val){
                if ($key=="image"){
                    echo "<td><img src='{$val}'/></td>";
                }
               else{
                   echo "<td>".$val."</td>";
               }
            }

            echo "<td>{$row['id']}</td>";
            echo "<td><a href='modifierProduit.php?id={$row['id']}'><button>Modifier</button></a></td>";
            echo  " <td><a href='product.delete.php?id={$row['id']}'><button onclick='deleteCheck()'>Delete</button></a></td>";
            echo "</tr>";
        }
       /* $r = $r . " <td><a href='product.edit.php?id={$row[0]}'><button>Modifier</button></a></td>";
        $r = $r . " <td><a href='product.delete.php?id={$row[0]}'><button>Delete</button></a></td>";
        $r = $r."</tr>";
        */
        echo "</tbody></table>";
    }
    
    

    $sql = "SELECT * from produits ";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

  
    
    showProduit($res);
    
    
    
?>
<?php
    require("../components/footer.php");
?>
<script>
    function deleteCheck(){
        alert("voulez vous vraiment supprimer ce produit");
    }
</script>

