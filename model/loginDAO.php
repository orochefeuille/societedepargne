<?php

if(!empty($_POST) && isset($_POST["login"])) {
    $db = db_connection();

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
}
