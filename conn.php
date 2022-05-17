<?php
$user = "root";
$pass = "";
$db_name="phonestore";
try {
    $dbh = new PDO("mysql:host=localhost;dbname={$db_name}", $user, $pass);
} catch (PDOExceCodeption $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
