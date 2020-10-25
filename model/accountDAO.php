<?php
    class accountDAO {
        private $db;

        public function __construct($dbConnexion)
        {
            $this->db = $dbConnexion;
        }

        // Create
        public function createCustomerAccount(Account $account) {
            $query = $this->db->prepare(
                "INSERT INTO account (label, iban, balance, customer_id)
                 VALUES (:label, :iban, :balance, :customer_id)
                "              
            );

            $result = $query->execute(
                [
                    "label" => $account->getLabel(),
                    "iban" => $account->getIban(),
                    "balance" => $account->getBalance(),
                    "customer_id" => $account->getCustomer_id()
                ]
            );
            return $result;
        }

        // Read
        public function getCustomerAccount($session_id, $account_index) {
            $query = $this->db->prepare(
                "SELECT a.* 
                 FROM account AS a
                 INNER JOIN customer AS c 
                    ON c.id = a.customer_id 
                 WHERE a.customer_id = :customer_id
                    AND a.id = :index
                "              
            );

            $result = $query->execute(
                [
                    "customer_id" => $session_id,
                    "index" => $account_index
                ]
            );

            $query->setFetchMode(PDO::FETCH_CLASS, "Account");
            $customer_account= $query->fetch();
            return $customer_account;
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

        public function getCustomerAccountBalance($account_index) {
            $query = $this->db->prepare(
                        "SELECT balance 
                         FROM account
                         WHERE id = :account_index
                        "              
            );

            $result = $query->execute(
                [
                    "account_index" => $account_index
                ]
            );
            $customer_account_balance = $query->fetch(PDO::FETCH_ASSOC);
            return $customer_account_balance;
        }

        // Update
        public function updateBalance($newBalance, $account_index) {
            $query = $this->db->prepare(
                "UPDATE account 
                 SET balance = :newBalance
                 WHERE id = :account_id
                "              
            );

            $result = $query->execute(
                [   
                    "newBalance" => $newBalance,
                    "account_id" => $account_index
                ]
            );
            return $result;           
        }

        // Delete
        public function deleteAccount($account_index) {
            $query = $this->db->prepare(
                "DELETE 
                 FROM account
                 WHERE id = :account_id
                "              
            );

            $result = $query->execute(
                [
                    "account_id" => $account_index
                ]
            );
            return $result;
        }
    }