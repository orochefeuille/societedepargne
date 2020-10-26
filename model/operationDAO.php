<?php
    class OperationDAO {
        private $db;

        public function __construct($dbConnexion)
        {
            $this->db = $dbConnexion;
        }
        
        //Create
        public function addOperation(Operation $operation) {
            $query = $this->db->prepare(
                "INSERT INTO operation(date_transaction, amount, is_credit, comments, account_id) 
                 VALUES(NOW(), :amount, :is_credit, :comments, :account_id)
                "              
            );

            $result = $query->execute(
                [
                    "amount" => $operation->getAmount(),
                    "is_credit" => $operation->getIs_credit(),
                    "comments" => $operation->getComments(),
                    "account_id" => $operation->getAccount_id()
                ]
            );
            return $result;
        }
        
        // Read
        public function getAccountOperations($account_id) {
            $query = $this->db->prepare(
                        "SELECT o.date_transaction, o.amount, o.comments, o.is_credit
                         FROM operation As o
                         WHERE o.account_id = :account_id
                         ORDER BY o.date_transaction DESC
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
    }