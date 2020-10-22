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

$accountDAO = new accountDAO($dbConnexion);
$account = $accountDAO->getCustomerAccount($_SESSION["id"], $account_index);

$operationDAO = new operationDAO($dbConnexion);
$account_operations = $operationDAO->getAccountOperations($account_index);

// Delete account
$is_account_deleted = false;
if(isset($_POST["confirm-delete"])) {
  $is_account_deleted = $accountDAO->deleteAccount($account_index);
}

require "view/singleaccountView.php"; 