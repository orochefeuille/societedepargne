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
$operationDAO = new operationDAO($dbConnexion);



// Delete this account
$is_account_deleted = false;
if(isset($_POST["confirm-delete"])) {
  $is_account_deleted = $accountDAO->deleteAccount($account_index);
}

// Credit this account
$is_credited = false;
$is_debited = false;
if(!empty($_POST) && isset($_POST["is_credit"])) {
  $_POST["amount"] = htmlspecialchars($_POST["amount"]);
  $_POST["comments"] = htmlspecialchars($_POST["comments"]);
  $_POST["is_credit"] = intVal($_POST["is_credit"]);
  $_POST["account_id"] = $account_index;
  $new_operation = new Operation($_POST);
  if($_POST["is_credit"] == 1) {
    $is_credited =$operationDAO->addOperation($new_operation);
  }
  else {
    $is_debited =$operationDAO->addOperation($new_operation);
  }
}

// show customer account details
$account = $accountDAO->getCustomerAccount($_SESSION["id"], $account_index);

// Display transactions in desc for this account
$account_operations = $operationDAO->getAccountOperations($account_index);
require "view/singleaccountView.php"; 