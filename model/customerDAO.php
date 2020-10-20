<?php
require "db_connection.php";

class CustomerDAO {
    private $db;

    public function __construct()
    {
        $dbConnexion = new DbConnection();
        $this->db= $dbConnexion->getDb();
    }

    public function getCustomer(string $email) {
        $query = $this->db->prepare(
                    "SELECT * 
                     FROM customer 
                     WHERE email = :email
                    "              
        );
        $result = $query->execute(
            [
                "email" => $email
            ]
        );

        $customer= $query->fetch(PDO::FETCH_ASSOC);
        return $customer;
    }
}

