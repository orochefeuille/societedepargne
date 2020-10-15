<?php
require "db_connection.php";
$dbConnexion = new DbConnection();
$db= $dbConnexion->getDb();

if(!empty($_POST) && isset($_POST["login"])) {
    $query = $db->prepare(
        "SELECT * 
         FROM customer 
         WHERE email = :email
        "              
    );
    $result = $query->execute(
        [
            "email" => htmlspecialchars($_POST["email"])
        ]
    );

    $user = $query->fetch(PDO::FETCH_ASSOC);
    var_dump($user);
 
}
