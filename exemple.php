
<?php
/*echo "<h1>bonjour</h1> ";
    $lastname= "Sfaxi";
    echo $firstname." ".$lastname;
    */

    // exercice 
    /*$firstname= "Habib";
    $pi = 3;
    $t = array(1,2,3,4);
    echo $t;
    echo "\n";
    echo " ".gettype($firstname);
    echo " ".gettype($pi);
    echo "\n";
    echo "\n";
    echo "<br>";
    for ($i=0;$i<count($t);$i++){
        echo "t[".$i."]=".$t[$i];
        echo "<br>";
    }
    */
    /*for ($i=0;$i<5;$i++){
        echo "number is : ".$i;
    $produits = array([1,"cache iphone 12",20,"cache"],[2,"telifoun",1000,"tel"],);

    }*/
    /*
    function showTable($list){
        echo "<table border=1>
        <thead>
            <tr>
                <th>id_produit</th>
                <th>nom produit</th>
                <th>prix</th>
                <th>categorie</th>
            </tr>
        </thead>";
        for ($i=0;$i<count($list);$i++){
            if ($list[$i][2]<100){
                echo "<tr>
                <td>{$list[$i][0]}</td>
                <td>{$list[$i][1]}</td>
                <td>{$list[$i][2]}</td>
                <td>{$list[$i][3]}</td>
            </tr>";
            }
        }
        echo "</tbody></table>";
    }*/
    function showRow($row){
        $r = "<tr>";
        for ($i=0;$i<count($row);$i++){
            if ($i == 3){
                 $r = $r."<td><img width='400px' src='{$row[$i]}' alt=''/></td>"; 
            }else{
                $r = $r."<td>{$row[$i]}</td>";
            }
        }
        $r = $r."</tr>";
        echo $r;
        
    }
    
    
        echo "<table border=1><thead>
            <tr>
                <th>id_produit</th>
                <th>nom produit</th>
                <th>prix</th>
                <th>image</th>
                <th>categorie</th>
            </tr>
        </thead>";
        foreach($dbh->query('SELECT * from produits') as $row) {
            showRow($row);
        }
        echo "</tbody></table>";
    
  
?>