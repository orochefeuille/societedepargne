<?php

require "model/db_connection.php";
$dbConnexion = new DbConnection();
$dbConnexion = $dbConnexion->getDb();

require "model/operationDAO.php";
require "model/entity/operation.php"; 

require "model/accountDAO.php";
require "model/entity/account.php"; 

session_start();
if (!isset($_SESSION['id'])) {
  header('Location: http://localhost/societedepargne/login.php');
}
$account_index = htmlspecialchars($_GET['account-index']);

// show customer account details
$accountDAO = new accountDAO($dbConnexion);
$account = $accountDAO->getCustomerAccount($_SESSION["id"], $account_index);

// Display transactions in desc for this account
$operationDAO = new operationDAO($dbConnexion);
$account_operations = $operationDAO->getAccountOperations($account_index);

// Delete account
$is_account_deleted = false;
if(isset($_POST["confirm-delete"])) {
  $is_account_deleted = $accountDAO->deleteAccount($account_index);
}

// Credit this account
$is_credited = false;
$is_debited = false;
if(isset($_POST["validate-transaction"])) {
  var_dump($_POST);
}

require "view/singleaccountView.php"; 