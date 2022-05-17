<?php
        require("../conn.php");
        if (isset($_GET['search'])){
            $search = $_GET['search'];
            if (!$search==""){
                $sql = "SELECT * FROM produits WHERE nom LIKE '%$search%'";
                $result = $dbh->query($sql);
                $result = $result->fetchAll();
                $myJSON = json_encode($result);
                echo $myJSON;
            }else{
                $result = array();
                $myJSON = json_encode($result);
                echo $myJSON;
            }
        }
?>