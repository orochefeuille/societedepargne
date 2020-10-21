<?php
    require "db_connection.php";

    class accountDAO {
        private $db;

        public function __construct()
        {
            $dbConnexion = new DbConnection();
            $this->db = $dbConnexion->getDb();
        }

        public function getCustomerAccounts($session_id) {
            $query = $this->db->prepare(
                        "SELECT a.* 
                         FROM account AS a
                         INNER JOIN customer AS c 
                            ON c.id = a.customer_id 
                         WHERE a.customer_id = :customer_id
                        "              
            );

            $result = $query->execute(
                [
                    "customer_id" => $session_id
                ]
            );
  
            $customer_accounts= $query->fetchAll(PDO::FETCH_CLASS, "Account");
            return $customer_accounts;
        }
    }