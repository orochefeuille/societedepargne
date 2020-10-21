<?php
    require "db_connection.php";

    class operationDAO {
        private $db;

        public function __construct()
        {
            $dbConnexion = new DbConnection();
            $this->db = $dbConnexion->getDb();
        }

        // public function getAccountOperation($account_id) {
        //     $query = $this->db->prepare(
        //                 "
        //                 "              
        //     );

        //     $result = $query->execute(
        //         [
        //             "account_id" => $account_id
        //         ]
        //     );
  
        //     $account_operations= $query->fetchAll(PDO::FETCH_CLASS, "Operation");
        //     return $account_operations;
        // }
    }