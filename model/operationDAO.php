<?php
    class operationDAO {
        private $db;

        public function __construct($dbConnexion)
        {
            $this->db = $dbConnexion;
        }

        public function getAccountOperations($account_id) {
            $query = $this->db->prepare(
                        "SELECT o.date_transaction, o.amount, o.comments, o.is_credit
                         FROM operation As o
                         WHERE o.account_id = :account_id
                        "              
            );

            $result = $query->execute(
                [
                    "account_id" => $account_id
                ]
            );
  
            $account_operations= $query->fetchAll(PDO::FETCH_CLASS, "Operation");
            return $account_operations;
        }

        public function getAccountLastOperation($account_id) {
            $query = $this->db->prepare(
                        "SELECT MAX(o.date_transaction) AS last_transaction, o.amount, o.is_credit
                         FROM operation As o
                         WHERE o.account_id = :account_id
                        "              
            );

            $result = $query->execute(
                [
                    "account_id" => $account_id
                ]
            );

            $query->setFetchMode(PDO::FETCH_CLASS, "Operation");
            $last_operation = $query->fetch();
            return $last_operation;
        }
    }