<?php
require "model/db_connection.php";
$dbConnexion = new DbConnection();
$dbConnexion = $dbConnexion->getDb();
require "model/accountDAO.php";
require "model/entity/account.php";   
require "model/operationDAO.php";
require "model/entity/operation.php";

$accountDAO = new accountDAO($dbConnexion);
$operationDAO = new operationDAO($dbConnexion);

session_start ();
if (!isset($_SESSION['id'])) {
  header('Location: http://localhost/societedepargne/login.php');
}

// Get all customer's accounts label
$customer_accounts = $accountDAO->getCustomerAccounts($_SESSION["id"]);
$customer_accounts_labels = [];
foreach ($customer_accounts as $customer_account) {
  array_push($customer_accounts_labels, $customer_account->getLabel());
}



require "view/bankTransferView.php"; 
